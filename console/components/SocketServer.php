<?php

namespace app\console\components;

use app\models\Messages;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use app\models\Users;
use app\models\ChatSessions;

class SocketServer implements MessageComponentInterface
{
    protected $clients; // connections array, client has user_id and chat_id
    protected $chats; // chats array, chats have chat_id that have user_id that have connections
    protected $adminClients; // handling admin connections

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients[$conn->resourceId]['conn'] = $conn;
        echo "New connection! ({$conn->resourceId})\n";
        $conn->send(json_encode([
            'type' => 'connection_success',
        ]));
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $connId = $from->resourceId; // connection id
        $data = json_decode($msg, true); // json data receive
        $action = (isset($data['action'])) ? $data['action'] : $data['type'];
        switch ($action) {
            case 'auth':
                $chatToken = (isset($data['chat_token'])) ? $data['chat_token'] : $data['message'];
                $chatSession = ChatSessions::find()->where(['id' => $chatToken])->one();
                if ($chatSession) {
                    $chatId = $chatSession->chat_id;
                    $userId = $chatSession->user_id;
                    $sessionId = $chatSession->id;
                    if (!$this->checkUserChatPresence($userId, $chatId)) {
                        $userName = Users::findOne($userId)->name;
                        $messageText = "User $userName is now <span class='label label-success'>online</span>";
                        $messageArray = json_encode([
                            'type' => 'service',
                            'message' => html_entity_decode($messageText),
                            'user_id' => $userId,
                            'date' => date('Y-m-d H:i:s'),
                            'user_name' => $userName,
                        ]);
                        $this->chatBroadCast($chatId, $messageArray);
                        $this->adminBroadCast($userId, $userName, $chatId, 1);
                    }
                    // adding connection information to clients array
                    $this->clients[$connId]['user_id'] = $userId;
                    $this->clients[$connId]['chat_id'] = $chatId;
                    // adding connections to chats array
                    $this->chats[$chatId][$userId][$connId] = true;
                } else {
                    unset($this->clients[$connId]);
                }
                break;
            case 'msg':
                $userId = $this->clients[$connId]['user_id'];
                $chatId = $this->clients[$connId]['chat_id'];
                $messageText = $data['msg'];
                // forming message
                $messageText = htmlspecialchars($messageText);
                $message = new Messages();
                $message->user_id = $userId;
                $message->chat_id = $chatId;
                $message->text = $messageText;
                $message->datetime = date('Y-m-d H:i:s');
                $message->save();

                $messageArray = json_encode([
                    'type' => 'message',
                    'message' => $messageText,
                    'user_id' => $userId,
                    'user_name' => Users::findOne($userId)->name,
                    'date' => $message->datetime,
                ]);

                // sending messages
                $this->chatBroadCast($chatId, $messageArray);
                break;
            case 'adm-auth':
                $chatToken = $data['chat_token'];
                $chatSession = ChatSessions::find()->where(['id' => $chatToken, 'chat_id' => 0])->one();
                if ($chatSession) {
                    $this->clients[$connId]['admin'] = true;
                    $this->adminClients[] = $connId;
                }
                break;
            case 'remove-user':
                if (isset($this->clients[$connId]['admin']) && $this->clients[$connId]['admin']) {
                    $userId = $data['user_id'];
                    $chatId = $data['chat_id'];
                    // terminate user connection
                    if (isset($this->chats[$chatId][$userId]) && $userConnections = $this->chats[$chatId][$userId]) {
                        $messageArray = json_encode([
                            'type' => 'termination',
                        ]);
                        foreach ($userConnections as $key => $userConnection) {
                            $this->clients[$key]['conn']->send($messageArray);
                        }
                    }
                }
                break;
            case 'get-user-list':
                $list = [];
                $userIds = [];
                //$this->chats[$chatId][$userId][$connId]
                if (isset($this->chats) && count($this->chats) > 0) {
                    foreach ($this->chats as $chatId => $connections) {
                        foreach ($connections as $userId => $connection) {
                            if ($connection) {
                                $list[$chatId][] = $userId;
                                $userIds[] = $userId;
                            }
                        }
                    }
                }
                $userIds = array_unique($userIds);
                $userNames = Users::find()->where(['in', 'id', $userIds])->asArray()->all();

                $namesArray = [];
                foreach ($userNames as $userName) {
                    $namesArray[$userName['id']] = $userName['name'];
                }

                //var_dump($namesArray);
                //var_dump($this->chats);

                // mapping

                $data = [];

                if (count($list) > 0 && count($userNames) > 0) {
                    foreach ($list as $chatId => $item) {
                        $userArray = [];
                        foreach ($item as $user) {
                            $userArray[] = [
                                'id' => $user,
                                'name' => $namesArray[$user],
                            ];
                        }
                        $data[] = [
                            'chat_id' => $chatId,
                            'user_list' => $userArray,
                        ];
                    }
                }

                $messageArray = json_encode([
                    'type' => 'user_list',
                    'data' => $data,
                ]);

                $this->clients[$connId]['conn']->send($messageArray);
                break;
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $connId = $conn->resourceId;
        $userId = $this->clients[$connId]['user_id'];
        $chatId = $this->clients[$connId]['chat_id'];
        unset($this->clients[$connId]);
        unset($this->chats[$chatId][$userId][$connId]);
        // if admin
        if ($chatId == 0) {
            if (isset($this->adminClients[$connId])) unset($this->adminClients[$connId]);
        } else {
            if (!$this->checkUserChatPresence($userId, $chatId)) {
                $userName = Users::findOne($userId)->name;
                $messageText = "User $userName is now <span class='label label-danger'>offline</span>";
                $messageArray = json_encode([
                    'type' => 'service',
                    'message' => html_entity_decode($messageText),
                    'user_id' => $userId,
                    'date' => date('Y-m-d H:i:s'),
                    'user_name' => $userName,
                ]);

                // sending messages
                $this->chatBroadCast($chatId, $messageArray);
                $this->adminBroadCast($userId, $userName, $chatId, 0);
            }
        }
        echo "Connection {$connId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }

    protected function adminBroadCast($userId, $userName, $chatId, $status)
    {
        if (isset($this->adminClients) && is_array($this->adminClients) && count($this->adminClients) > 0) {
            // admin broadcast
            $messageArray = json_encode([
                'type' => 'service',
                'user_id' => $userId,
                'chat_id' => $chatId,
                'user_name' => $userName,
                'action' => $status
            ]);

            foreach ($this->adminClients as $connId) {
                @$this->clients[$connId]['conn']->send($messageArray);
            }
        }
    }

    protected function chatBroadCast($chatId, $messageArray)
    {
        // sending messages
        if (isset($this->chats[$chatId]) && is_array($this->chats[$chatId]) && count($this->chats[$chatId]) > 0) {
            foreach ($this->chats[$chatId] as $userConnections) {
                if (isset($userConnections) && is_array($userConnections) && count($userConnections) > 0) {
                    foreach ($userConnections as $key => $value) {
                        $this->clients[$key]['conn']->send($messageArray);
                    }
                }
            }
        }
    }

    protected function checkUserChatPresence($userId, $chatId)
    {
        if (isset($this->chats[$chatId]) && isset($this->chats[$chatId][$userId]) && count($this->chats[$chatId][$userId]) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
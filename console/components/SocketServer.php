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

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients[$conn->resourceId]['conn'] = $conn;
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $connId = $from->resourceId; // connection id
        $data = json_decode($msg, true); // json data receive
        switch ($data['action']) {
            case 'auth':
                $chatToken = $data['chat_token'];
                $chatSession = ChatSessions::find()->where(['id' => $chatToken])->one();
                if ($chatSession) {
                    $chatId = $chatSession->chat_id;
                    $userId = $chatSession->user_id;
                    $sessionId = $chatSession->id;
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

                $message = new Messages();
                $message->user_id = $userId;
                $message->chat_id = $chatId;
                $message->text = $messageText;
                $message->datetime = date('Y-m-d H:i:s');
                $message->save();

                $messageArray = json_encode([
                    'type' => 'message',
                    'message' => html_entity_decode($messageText),
                    'user_id' => $userId,
                    'user_name' => Users::findOne($userId)->name,
                    'date' => $message->datetime,
                ]);

                // sending messages
                foreach ($this->chats[$chatId] as $userConnections) {
                    foreach ($userConnections as $key => $value) {
                        $this->clients[$key]['conn']->send($messageArray);
                    }
                }
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
        echo "Connection {$connId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}
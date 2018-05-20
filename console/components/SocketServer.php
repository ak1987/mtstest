<?php

namespace app\console\components;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class SocketServer implements MessageComponentInterface
{
    protected $clients; // connections array
    protected $users; // users array

    public function onOpen(ConnectionInterface $conn)
    {
        echo 'Connection opened';
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        echo 'Message Received';
    }

    public function onClose(ConnectionInterface $conn)
    {
        echo 'Connection closed';
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}
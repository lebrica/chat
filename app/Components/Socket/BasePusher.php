<?php

namespace App\Components\Socket;

use Ratchet\Wamp\WampServerInterface;
use Ratchet\ConnectionInterface;

class BasePusher implements WampServerInterface
{

    protected $subscribedChannel = [];

    public function getSubscribedChannel()
    {
        return $this->subscribedChannel;
    }

    public function addSubscribedChannel($channel)
    {
        $this->subscribedChannel[$channel->getId()] = $channel;
    }

    function onSubscribe(ConnectionInterface $conn, $channel)
    {
        $this->addSubscribedChannel($channel);
    }

    function onUnSubscribe(ConnectionInterface $conn, $channel)
    {
        // TODO: Implement onUnSubscribe() method.
    }

    function onOpen(ConnectionInterface $conn)
    {
        echo "New connection!!! ({$conn->resourceId}) \n";
    }

    function onClose(ConnectionInterface $conn)
    {
        echo "Connection {$conn->resourceId} has disconnect \n";
    }

    function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()} \n";
        $conn->close();
    }

    function onCall(ConnectionInterface $conn, $id, $channel, array $params)
    {
        // In this application if clients send data it's because the user hacked around in console
        $conn->callError($id, $channel, 'You are not allowed to make calls')->close();
    }

    function onPublish(ConnectionInterface $conn, $topic, $event, array $exclude, array $eligible)
    {
        // In this application if clients send data it's because the user hacked around in console
        $conn->close();
    }

}

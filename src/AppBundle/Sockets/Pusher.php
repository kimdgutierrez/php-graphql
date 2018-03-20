<?php
namespace AppBundle\Sockets;

use Ratchet\ConnectionInterface;
use Ratchet\Wamp\WampServerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Pusher implements WampServerInterface
{
    protected $subscribedTopics = [];
//     protected $container;
    
//     public function __construct(ContainerInterface $container)
//     {
//         $this->container = $container;
//     }
    
    public function onSubscribe(ConnectionInterface $conn, $topic)
    {
        // if (!array_key_exists($topic->getId(), $this->subscribedTopics)) {
        $this->subscribedTopics[$topic->getId()] = $topic;
        // }
    }
    
    /**
     * @param string JSON'ified string we'll receive from ZeroMQ
     */
    public function onPushNotify($entry)
    {
        $entryData = json_decode($entry, true);
        // If the lookup topic object isn't set there is no one to publish to
        if (!array_key_exists($entryData['cat'], $this->subscribedTopics)) {
            echo "No one is subscribe! \n";
            return;
        }
        $topic = $this->subscribedTopics[$entryData['cat']];
        // re-send the data to all the clients subscribed to that category
        $topic->broadcast($entryData);
        echo "There is subscritption! \n";
    }
    
    public function onUnSubscribe(ConnectionInterface $conn, $topic) {
    }
    public function onOpen(ConnectionInterface $conn) {
        echo "New connection! ({$conn->resourceId})\n";
    }
    public function onClose(ConnectionInterface $conn) {
        echo "Connection {$conn->resourceId} has disconnected\n";
    }
    public function onCall(ConnectionInterface $conn, $id, $topic, array $params) {
        // In this application if clients send data it's because the user hacked around in console
        $conn->callError($id, $topic, 'You are not allowed to make calls')->close();
    }
    public function onPublish(ConnectionInterface $conn, $topic, $event, array $exclude, array $eligible) {
        // In this application if clients send data it's because the user hacked around in console
        $conn->close();
    }
    public function onError(ConnectionInterface $conn, \Exception $e) {
    }
}
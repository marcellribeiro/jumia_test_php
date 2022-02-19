<?php 

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\User;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Connection\AMQPStreamConnection;
 
class QueueController extends Controller
{
    public function send($msg)
    {
        $connection = new  AMQPStreamConnection("rabbitmq", 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->queue_declare("managerNotify", false, true, false, false);

        $rabbitMsg = new AMQPMessage($msg);
        $channel->basic_publish($rabbitMsg, '', "managerNotify");

        $channel->close();
        $connection->close();

        return true;
    }
}

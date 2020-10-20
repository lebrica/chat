<?php


namespace App\Components\Socket;


use Illuminate\Support\Facades\Redis;

class Pusher extends BasePusher
{
    static function sendDataToServer(array $data)
    {
        $data = json_encode($data);

        $redis = new \Redis();
        $redis->connect('redis', '6379');
        $redis->publish('chat', $data);
        $redis->close();
        //Redis::publish('chat', json_encode($data));
    }

    public function broadcast($jsonDataToSend)
    {
        $assocData = json_decode($jsonDataToSend, true);

        $subscribedChannel = $this->getSubscribedChannel();

        if (isset($subscribedChannel[$assocData['channel']]))
        {
            $channel = $subscribedChannel[$assocData['channel']];
            $channel->broadcast($assocData);
        }
    }
}

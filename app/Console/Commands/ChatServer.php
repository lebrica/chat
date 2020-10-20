<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Components\Socket\Pusher;
use React\EventLoop\Factory;

use Ratchet\Wamp\WampServer;
use Ratchet\Http\HttpServer;
use React\Socket\Server;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;


class ChatServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat:serve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pusher = new Pusher();
        $loop = Factory::create();
        $factory = new  \Clue\React\Redis\Factory($loop);

        $channel = isset($argv[1]) ? ($argv[1]) : 'chat';

        $client = $factory->createLazyClient('redis:6379');

        $client->subscribe($channel)->then(function () {
            echo "Now subscribed to channel \n" ;
        });

        $client->on('message', function ($channel, $message) use ($pusher) {
            echo 'Message on ' . $channel . ': ' . $message ."\n";

            $pusher->broadcast($message);
        });

        $webSock = new Server('0.0.0.0:8080', $loop);
        $webServer = new IoServer(
            new HttpServer(
                new WsServer(
                    new WampServer(
                        $pusher
                    )
                )
            ),
            $webSock
        );
        echo "Pusher starting...\n";
        $loop->run();
    }
}

<?php

namespace App\Console\Commands;

use App\Components\Socket\Chat;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use React\EventLoop\Factory;

class testccc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:chat';

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


        Redis::subscribe('chat', function ($mess){
            echo $mess;
        });
//        $server = IoServer::factory(
//            new HttpServer(
//                new WsServer(
//                    new Chat()
//                )
//            ),
//            8080
//        );
//
//        $server->run();
    }
}

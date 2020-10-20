<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;
use App\Components\Socket\Pusher;

class TestController extends Controller
{
    public function index()
    {
        return view('testview');
    }

    public function sendMessage()
    {
        $message = $_POST['message'];
        $data = [
          'message' =>$message,
          'channel' => 'chat1'
        ];

        Pusher::sendDataToServer($data);

        echo json_encode($data);
    }
}

<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;
use App\Components\Socket\Pusher;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('testview');
    }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $userName = \Auth::user()->name;
        $data = [
            'name' => $userName,
            'message' =>$message,
            'channel' => 'chat'
        ];

        Pusher::sendDataToServer($data);
    }
}

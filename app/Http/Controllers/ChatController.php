<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(){
        if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||  isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
        {
            $socketPath = 'wss://www.pennfly.com/chatserve/';
        }else {
            $socketPath = 'ws://www.pennfly.com/chatserve/';
        }
        $data['socketPath'] = $socketPath;
        return view('chat.chat',['data'=> (object)$data ]);
    }
}

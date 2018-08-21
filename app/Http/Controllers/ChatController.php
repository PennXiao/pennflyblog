<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(){
        return view('chat.chat',['src'=>'www.pennfly.com:8080']);
    }
}

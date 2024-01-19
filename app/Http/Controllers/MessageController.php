<?php

// app/Http/Controllers/MessageController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewMessageNotification;


class MessageController extends Controller
{
    public function sendMessage()
    {
        // Your logic for displaying messages goes here
    }
    public function index(Request $request)
    {
        // 發送訊息的邏輯

        // 通知使用者有新訊息
        auth()->user()->notify(new NewMessageNotification());

        // 其他邏輯...
    }
}

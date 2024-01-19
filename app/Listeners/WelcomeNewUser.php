<?php

namespace App\Listeners;

use App\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\WelcomeEmail;

class WelcomeNewUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        //
        $user = $event->user;

        // 设置用户默认角色的逻辑
        // $user->assignRole('user');

        // 发送欢迎邮件的逻辑
        Mail::to($user->email)->send(new WelcomeEmail($user));
        // 记录用户注册日志的逻辑
        Log::info('User registered: ' . $user->name);
    }
}

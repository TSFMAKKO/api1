<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Events\UserRegistered;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct(UserRegistered $event)
    {
        //
        // $user = $event->user;
        // 在這裡寫發送歡迎郵件的邏輯
        // 例如使用 Laravel 的郵件功能: \Illuminate\Support\Facades\Mail::to($user)->send(new WelcomeEmail($user));
 
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        //
        $user = $event->user;

        // 使用 Laravel 郵件功能發送歡迎郵件
        Mail::to($user->email)->send(new WelcomeEmail($user));
    
    }
}

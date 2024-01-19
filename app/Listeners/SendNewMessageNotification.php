<?php

namespace App\Listeners;

use App\Events\NewMessageEvent;
use App\Notifications\NewMessageNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewMessageNotification implements ShouldQueue
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
    public function handle(NewMessageEvent $event)
    {
        //
        // 發送通知的邏輯
        $event->user->notify(new NewMessageNotification());
    }
}

<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;

class UpdateVendorAboutOrder implements ShouldQueue
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
    public function handle(OrderPlaced $event): void
    {
        //
        // Http::post('https://vendor.company.com', [
        //     'order' => $event->order->toArray(),
        // ]);


        // info("vendor as was updated about order", $event->post->id);
        info("vendor as was updated about order", ['post_id' => $event->post->id, 'content' => $event->post->content]);
    }
}

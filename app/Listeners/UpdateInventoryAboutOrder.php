<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateInventoryAboutOrder implements ShouldQueue
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
        // Http::post('https://inventory.company.com', [
        //     'order' => $event->order->toArray()
        // ]);
        // info("Inventory as was updated about order", $event->post->id);

        info("Inventory as was updated about order", ['post_id' => $event->post->id, 'content' => $event->post->content]);
    }
}

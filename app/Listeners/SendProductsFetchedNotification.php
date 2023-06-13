<?php

namespace App\Listeners;

use App\Events\ProductsFetchedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProductsFetchedNotification
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
    public function handle(ProductsFetchedEvent $event): void
    {
        dd($event->products);
    }
}

<?php

namespace App\Listeners;

use App\Events\BooksFetchedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendBooksFetchedNotification
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
    public function handle(BooksFetchedEvent $event): void
    {
        dd($event->books);
    }
}

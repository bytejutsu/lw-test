<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithBroadcasting;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BooksFetchedEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    //use InteractsWithBroadcasting;

    public array $books;

    /**
     * Create a new event instance.
     */
    public function __construct(array $books)
    {
        $this->books = $books;
        //$this->broadcastVia('pusher');
    }

    public function broadcastAs()
    {
        return 'BooksFetchedEvent';
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */

    /*
    public function broadcastOn(): array
    {

        //dd('broadcastOn is fired');


        return [
            new PrivateChannel('books'),
        ];


    }
    */

    public function broadcastOn()
    {
        //dd('broadcast is fired');
        return [new Channel('books')];
    }


}

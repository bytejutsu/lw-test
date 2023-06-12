<?php

namespace Tests\Feature;

use App\Events\BooksFetchedEvent;
use App\Http\Livewire\BookListComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class BooksFetchedEventTest extends TestCase
{

    public function testBooksFetchedEventIsBroadcasted(): void
    {

        /*
        $channelName = 'books';
        $channelData = [];


        //Broadcast::shouldReceive('BooksFetchedEvent')->once()
        //    ->with(BooksFetchedEvent::class, $channelData, $channelName);


        //Event::fake();

        $books = ['some books from test'];

        // Dispatch the event
        event(new BooksFetchedEvent($books));

        // Assert that the event was broadcasted
        Event::assertDispatched(BooksFetchedEvent::class, function ($event) use ($channelName) {
            return $event->broadcastOn() === $channelName;
        });
        */

        //Queue::fake();

        /*
        Queue::assertListening(
            expectedEvent: BooksFetchedEvent::class,
            expectedListener: BookListComponent::class,
        );
        */
    }

    /**
     *  //  A basic feature test example.
     *  public function test_example(): void
        {
            $response = $this->get('/');

            $response->assertStatus(200);
        }
     */
}

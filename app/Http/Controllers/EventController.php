<?php

namespace App\Http\Controllers;

use App\Events\ProductsFetchedEvent;
use App\Jobs\FetchProductsJob;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //todo: update socket-io to latest version after communicating Echo listened events to Livewire and see if it still works

    public function index() {
        return view('event');
    }

    public function createEvent() {
        //broadcast(new BooksFetchedEvent(['some books' . rand() .  'from the controller']));
        dispatch(new FetchProductsJob('', 5));
        return response()->json(['status' => 'Event dispatched']);
    }
}

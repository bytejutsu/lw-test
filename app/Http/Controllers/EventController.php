<?php

namespace App\Http\Controllers;

use App\Events\BooksFetchedEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
        return view('event');
    }

    public function createEvent() {
        broadcast(new BooksFetchedEvent(['some books' . rand() .  'from the controller']));
        return response()->json(['status' => 'Event dispatched']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\SharedStateService\SharedStateService;

class FirstController extends Controller
{

    public function index(SharedStateService $sharedStateService)
    {
        $books = $sharedStateService->getState('books') ?? [];

        //

        $sharedStateService->append('books', 'b1 from c1');
        $sharedStateService->append('books', 'b2 from c1');
        $sharedStateService->append('books', 'b3 from c1');

        return view('books', compact('books'));
    }
}

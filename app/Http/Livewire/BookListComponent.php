<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Services\BookService;
use App\Services\SharedStateService;
use Livewire\Component;

class BookListComponent extends Component
{
    public array $books;

    protected $listeners = ['bookUpdated'];

    public function mount(SharedStateService $sharedStateService)
    {
        $this->books = $sharedStateService->get('books');;
    }

    public function bookUpdated($bookData, SharedStateService $sharedStateService)
    {
        //this is an event listener so the data it receives is serialized and needs to be converted back to an array of objects

        $this->books = BookService::getBooks($bookData['title']);

        $sharedStateService->put('books', $this->books);
    }

    public function render()
    {
        return view('livewire.book-list-component');
    }
}

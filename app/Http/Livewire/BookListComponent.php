<?php

namespace App\Http\Livewire;

use App\Services\BookService;
use App\Services\SharedStateService\SharedStateService;
use Livewire\Component;

class BookListComponent extends Component
{
    public array $books;

    protected $listeners = ['bookUpdated'];

    public function mount()
    {
        $this->books = SharedStateService::get('books');;
    }

    public function bookUpdated($bookData)
    {
        //this is an event listener so the data it receives is serialized and needs to be converted back to an array of objects

        $this->books = BookService::getBooks($bookData['title']);
        //SharedStateService::put('books', $this->books);
        SharedStateService::update('books', $this->books);
    }

    public function render()
    {
        return view('livewire.book-list-component');
    }
}

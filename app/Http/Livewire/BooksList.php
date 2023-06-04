<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class BooksList extends Component
{
    public array $books;

    protected $listeners = ['booksUpdated'];

    public function mount(array $books)
    {
        $this->books = $books;
    }

    public function booksUpdated($booksData)
    {
        //this is an event listener so the data it receives is serialized and needs to be converted back to an array of objects
        $this->books = array_map(fn ($bookData) => new Book($bookData['title'], $bookData['author']), $booksData);
    }

    public function render()
    {
        return view('livewire.books-list');
    }
}

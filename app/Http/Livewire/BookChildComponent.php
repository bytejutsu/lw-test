<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\EBook;
use Livewire\Component;

class BookChildComponent extends Component
{
    public Book $book;

    public function mount($book)
    {
        $this->book = new Book($book->title, $book->author);
    }

    public function updatedBook()
    {

        $this->emitUpBook($this->book);
    }

    private function emitUpBook($book)
    {
        $this->emitUp('bookUpdated', $book);
    }

    public function render()
    {
        return view('livewire.book-child-component');
    }
}

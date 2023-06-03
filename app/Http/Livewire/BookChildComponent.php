<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\EBook;
use Livewire\Component;

class BookChildComponent extends Component
{
    public Book $book;

    //rules are not necessary for wireable model

    public function mount(Book $book)
    {
        $this->book = $book;
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

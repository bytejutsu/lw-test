<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\EBook;
use App\Services\SharedStateService\SharedStateService;
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
        //todo: maybe track the components names with constants or enums !!!!

        $this->emitTo('parent-component', 'bookUpdated', $this->book);

        $this->emitTo('book-list-component', 'bookUpdated', $this->book);
    }

    public function render()
    {
        return view('livewire.book-child-component');
    }
}

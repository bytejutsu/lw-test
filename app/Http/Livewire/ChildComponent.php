<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class ChildComponent extends Component
{
    public $book;

    public function mount()
    {
        $this->book = ['title' => '', 'author' => ''];
    }

    public function updatedBook()
    {
        $book = new Book($this->book['title'], $this->book['author']);

        $this->emit('bookUpdated', $book->toArray());
    }

    public function render()
    {
        return view('livewire.child-component');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BooksList extends Component
{
    public array $books;

    public function mount(array $books)
    {
        $this->books = $books;
    }

    public function render()
    {
        return view('livewire.books-list');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DummyBooksListComponent extends Component
{
    //protected $listeners = ['BooksFetchedEvent' => 'booksUpdated'];

    protected $listeners = ['echo:books,.BooksFetchedEvent' => 'booksUpdated'];

    public array $books;

    public function mount(array $books)
    {
        $this->books = $books;
    }

    public function booksUpdated($value)
    {
        //dd($value);

        $books = $value['books'];

        $this->books = $books;
    }

    public function render()
    {
        return view('livewire.dummy-books-list-component');
    }
}

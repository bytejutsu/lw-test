<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\EBook;
use Livewire\Component;

class ChildComponent extends Component
{
    public $book;

    public EBook $eBook;

    public function mount()
    {
        $this->book = ['title' => '', 'author' => ''];

        $this->eBook = EBook::inRandomOrder()->first();
    }

    public function updatedBook()
    {
        $book = new Book($this->book['title'], $this->book['author']);

        $this->emit('bookUpdated', $book->toArray());
    }

    public function updatedEBook()
    {
        $eBook = new EBook($this->eBook->title, $this->eBook->author);

        $this->emit('eBookUpdated', $eBook->toArray());
    }

    public function render()
    {
        return view('livewire.child-component');
    }
}

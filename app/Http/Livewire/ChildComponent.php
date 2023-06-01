<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\EBook;
use Livewire\Component;

class ChildComponent extends Component
{
    public $book;

    public EBook $eBook;

    protected $rules = [
        'eBook.title' => 'string',
        'eBook.author' => 'string',
    ];

    public function mount()
    {
        $this->book = ['title' => '', 'author' => ''];

        $this->eBook = EBook::inRandomOrder()->first();
    }

    public function updatedBook()
    {
        $book = new Book($this->book['title'], $this->book['author']);

        //$this->emit('bookUpdated', $book->toArray());

        $this->emit('bookUpdated', $book);
    }

    public function updatedEBook()
    {
        $eBook = new EBook([
            'title' => $this->eBook->title,
            'author' => $this->eBook->author,
        ]);

        //$this->emit('eBookUpdated', $eBook->toArray());

        $this->emit('eBookUpdated', $eBook);

    }

    public function render()
    {
        return view('livewire.child-component');
    }
}

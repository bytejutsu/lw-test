<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\EBook;
use Livewire\Component;

class ChildComponent extends Component
{
    public $book;

    public EBook $eBook;

    //rules is necessary for the eloquent model property otherwise you get an error
    protected $rules = [
        'eBook.title' => 'string',
        'eBook.author' => 'string',
    ];

    public function mount()
    {
        //book must be an array otherwise livewire won't be able to pass it to the view (as a normal non-eloquent model object)
        $this->book = ['title' => '', 'author' => ''];
        //livewire is able to pass eloquent model object to the view
        $this->eBook = EBook::inRandomOrder()->first();
    }

    public function updatedBook()
    {
        $book = new Book($this->book['title'], $this->book['author']);

        //$this->emit('bookUpdated', $book->toArray());

        $this->emitUp('bookUpdated', $book);
    }

    public function updatedEBook()
    {
        $eBook = new EBook([
            'title' => $this->eBook->title,
            'author' => $this->eBook->author,
        ]);

        //$this->emit('eBookUpdated', $eBook->toArray());

        $this->emitUp('eBookUpdated', $eBook);

    }

    public function render()
    {
        return view('livewire.child-component');
    }
}

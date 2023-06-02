<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\EBook;
use Livewire\Component;

class ChildComponent extends Component
{
    public $book;

    public EBook $eBook;

    public $calculation;

    //rules is necessary for the eloquent model property otherwise you get an error
    protected $rules = [
        'eBook.title' => 'string',
        'eBook.author' => 'string',
    ];

    public function mount($book, $initEBook)
    {
        //dd('child mount run first');


        //book must be an array otherwise livewire won't be able to pass it to the view (as a normal non-eloquent model object)
        //$this->book = ['title' => 'first title after mounting the child', 'author' => 'first author after mounting the child'];
        $this->book = $book;
        //livewire is able to pass eloquent model object to the view
        //$this->eBook = EBook::inRandomOrder()->first();
        $this->eBook = new EBook($initEBook);

        //directly after performing initial calculations do reflect them on the parent => doesn't work :(


    }

    //this method will be wire to wire:init and called on init
    public function initialize()
    {
        //dd('child init run first');

        $this->emitUpBook($this->book);
        $this->emitUpEBook($this->eBook);
    }

    public function updatedBook()
    {
        $book = new Book($this->book['title'], $this->book['author']);

        $this->emitUpBook($book);
    }

    public function updatedEBook()
    {
        $eBook = new EBook([
            'title' => $this->eBook->title,
            'author' => $this->eBook->author,
        ]);

        $this->emitUpEBook($eBook);

    }

    private function emitUpBook($book)
    {
        //$this->emit('bookUpdated', $book->toArray());

        $this->emitUp('bookUpdated', $book);
    }

    private function emitUpEBook($eBook)
    {
        //$this->emit('eBookUpdated', $eBook->toArray());

        $this->emitUp('eBookUpdated', $eBook);
    }

    public function render()
    {
        return view('livewire.child-component');
    }
}

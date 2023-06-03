<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\EBook;
use Livewire\Component;

class ChildComponent extends Component
{
    public Book $book;

    public EBook $eBook;

    //rules is necessary for the eloquent model property otherwise you get an error
    protected $rules = [
        'eBook.title' => 'string',
        'eBook.author' => 'string',
    ];

    public function mount($aBook, $initEBook, $book)
    {
        //dd('child mount run first');

        //book must be an array otherwise livewire won't be able to pass it to the view (as a normal non-eloquent model object)
        //$this->book = ['title' => 'first title after mounting the child', 'author' => 'first author after mounting the child'];
        $this->book = new Book($book->title, $book->author);
        //livewire is able to pass eloquent model object to the view
        //$this->eBook = EBook::inRandomOrder()->first();
        $this->eBook = new EBook($initEBook);

        //initialize here directly after performing initial calculations do reflect them on the parent => doesn't work :(


    }

    public function updatedBook()
    {

        $this->emitUpBook($this->book);
    }

    public function updatedEBook()
    {

        $this->emitUpEBook($this->eBook);
    }

    private function emitUpBook($book)
    {
        $this->emitUp('aBookUpdated', $book->toArray());
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

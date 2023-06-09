<?php

namespace App\Http\Livewire;

use App\Services\BookService\BookService;
use Doctrine\Inflector\Rules\NorwegianBokmal\Inflectible;
use Livewire\Component;

class BookListComponent extends Component
{
    //todo: warning!!! passing an array of wireable objects to the view in livewire is buggy !!! doesn't work properly
    //public array $wireableBooks;
    public array $arrayBooks;


    public bool $showBookImage;

    protected $listeners = ['bookUpdated', 'showBookImageUpdated', 'maxBooksUpdated'];

    public function mount()
    {

    }

    public function bookUpdated($bookData)
    {
        //this is an event listener so the data it receives is serialized and needs to be converted back to an array of objects

        $bookTitle = $bookData['title'];

        //$this->wireableBooks = BookService::getWireableBooks($bookData['title']);
        //$this->arrayBooks = BookService::getArrayBooks($bookTitle);
        $this->arrayBooks = BookService::getArrayBooksWithImage($bookTitle);

    }


    //TODO: report bug on livewire repo!: leave the following two listener methods empty
    // and the books property will no longer be an array of wireable objects
    // and instead it will be an array of arrays

    public function maxBooksUpdated($maxBooksData)
    {
        //$this->wireableBooks = BookService::getWireableBooks('Laravel');
        $maxBooks = $maxBooksData;

        //$this->arrayBooks = BookService::getArrayBooks('Laravel', $maxBooks);
        $this->arrayBooks = BookService::getArrayBooksWithImage('Laravel', $maxBooks);

    }

    public function showBookImageUpdated($showBookImageData)
    {
        $this->showBookImage = $showBookImageData;

        //todo: !!!warning: forget the following line and you will get an error
        //$this->wireableBooks = BookService::getWireableBooks('Laravel');

    }


    public function render()
    {
        return view('livewire.book-list-component');
    }
}

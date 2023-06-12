<?php

namespace App\Http\Livewire;

use App\Events\BooksFetchedEvent;
use App\Jobs\FetchBooksJob;
use App\Models\WireableBook;
use App\Services\BookService\BookService;
use Doctrine\Inflector\Rules\NorwegianBokmal\Inflectible;
use Livewire\Component;

class BookListComponent extends Component
{
    //todo: warning!!! passing an array of wireable objects to the view in livewire is buggy !!! doesn't work properly
    //todo: maybe $wireableBooks needs to be of type Wireable !?
    //public array $wireableBooks;
    public array $arrayBooks;


    public bool $showBookImage;


    protected $listeners = ['echo:books,App\\Events\\BooksFetchedEvent' => 'myBooksFetched','bookUpdated',];  //'settingsUpdated',


    /*
    public function getListeners()
    {
        return [
            "bookUpdated",
            //"settingsUpdated",
            "echo:books,BooksFetchedEvent" => 'onBooksFetched',
        ];
    }
    */

    public function mount()
    {
        //dispatch(new FetchBooksJob('', 5));
    }


    public function myBooksFetched($books)
    {
        dd('booksFetched is fired');
        $this->arrayBooks = $books;
    }

    public function bookUpdated($bookData)
    {
        //this is an event listener so the data it receives is serialized and needs to be converted back to an array of objects

        $bookTitle = $bookData['title'];
        $maxBooks = session('maxBooks', 5);

        //$this->wireableBooks = BookService::getWireableBooks($bookData['title']);
        //$this->arrayBooks = BookService::getArrayBooks($bookTitle);

        try{
            //$this->arrayBooks = BookService::getArrayBooksWithImage($bookTitle, $maxBooks);
            //dispatch(new FetchBooksJob($bookTitle, $maxBooks));
            //broadcast(new BooksFetchedEvent([]));
        }catch(\Exception $e){
            dd($e->getMessage());
        }



    }


    //TODO: report bug on livewire repo!: leave the following two listener methods empty
    // and the books property will no longer be an array of wireable objects
    // and instead it will be an array of arrays

    /*

    public function settingsUpdated($maxBooksData, $showBookImageData)
    {
        $maxBooks = $maxBooksData;
        $showBookImage = $showBookImageData;

        $this->showBookImage = $showBookImage;

        $book = session('book', new WireableBook('',''));
        $bookTitle = $book->title;

        try{
            dispatch(new FetchBooksJob($bookTitle, $maxBooks));
            //$this->arrayBooks = BookService::getArrayBooksWithImage($bookTitle, $maxBooks);
        }catch(\Exception $e){
            dd($e->getMessage());
        }

    }

    */




    public function render()
    {
        return view('livewire.book-list-component');
    }
}

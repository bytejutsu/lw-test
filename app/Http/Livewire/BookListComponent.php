<?php

namespace App\Http\Livewire;

use App\Models\WireableBook;
use App\Services\BookService;
use App\Services\SharedStateService\SharedStateService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class BookListComponent extends Component
{
    public array $books;

    protected $listeners = ['bookUpdated', 'showBookImageUpdated', 'maxBooksUpdated'];

    public function mount()
    {

    }

    public function bookUpdated($bookData)
    {
        //this is an event listener so the data it receives is serialized and needs to be converted back to an array of objects

        $this->books = BookService::getBooks($bookData['title']);

        //SharedStateService::update('books', $this->books);
    }


    //TODO: report bug on livewire repo!: live the following two listener methods empty
    // and the books property will no longer be an array of wireable objects instead an array of arrays

    public function showBookImageUpdated($showBookImageData)
    {
        $this->books = BookService::getBooks('Laravel');
    }

    public function maxBooksUpdated($maxBooksData)
    {
        $this->books = BookService::getBooks('Laravel');
    }


    public function render()
    {
        return view('livewire.book-list-component');
    }
}

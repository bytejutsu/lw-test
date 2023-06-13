<?php

namespace App\Http\Livewire;

use App\Models\WireableBook;
use App\Models\EBook;
use App\Services\SharedStateService\SharedStateService;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class BookChildComponent extends Component
{
    public WireableBook $book;

    //rules are not necessary for wireable model

    // we added those rules to test if they can be bypassed when
    // the user alters the book.title and book.author from the local storage
    // as now the book.title and book.author are bound with alpine.js properties
    // that are stored in the browser locally
    //
    protected $rules = [
      'book.*' => 'string|max:16' //use * to validate all attributes of the book
    ];

    public function mount()
    {
        $this->book = new WireableBook("phone", "Matt Stauffer");
    }

    public function updatedBook($value)
    {

        $this->validateOnly('book.*'); //this works only because we used 'book.*' in the rules if not it won't work

        session(['book' => $this->book]);

        $this->notifyAboutBook();

    }

    private function notifyAboutBook()
    {
        //todo: maybe track the components names with constants or enums !!!!

        $this->emitTo('parent-component', 'bookUpdated', $this->book);

        $this->emitTo('book-list-component', 'bookUpdated', $this->book);

    }

    public function notify()
    {
        $this->notifyAboutBook();
    }

    public function render()
    {
        return view('livewire.book-child-component');
    }
}

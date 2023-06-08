<?php

namespace App\Http\Livewire;

use App\Models\WireableBook;
use App\Models\EBook;
use App\Services\SharedStateService\SharedStateService;
use Livewire\Component;

class BookChildComponent extends Component
{
    public WireableBook $book;

    //rules are not necessary for wireable model

    public function mount()
    {
        $this->book = new WireableBook("Laravel", "Matt Stauffer");
    }

    public function updatedBook()
    {
        //todo: maybe track the components names with constants or enums !!!!

        $this->notifyAboutBook();

    }

    private function notifyAboutBook()
    {
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

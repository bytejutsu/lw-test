<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\EBook;
use Livewire\Component;

class ABookChildComponent extends Component
{
    public array $aBook;

    public function mount(array $aBook)
    {
        $this->aBook = $aBook;
    }

    public function updatedABook()
    {
        $this->emitUpABook($this->aBook);
    }

    private function emitUpABook($aBook)
    {
        $this->emitUp('aBookUpdated', $aBook);
    }

    public function render()
    {
        return view('livewire.a-book-child-component');
    }
}

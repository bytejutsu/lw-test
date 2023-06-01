<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\EBook;
use Livewire\Component;

class ParentComponent extends Component
{
    /*
     * Livewire component's [parent-component] public property [book] must be of type:
     * [numeric, string, array, null, or boolean].
     * Only protected or private properties can be set as other types because JavaScript doesn't need to access them.
     */
    public $book;

    public $eBook;

    protected $listeners = ['bookUpdated','eBookUpdated'];


    public function bookUpdated($bookData)
    {
        $this->book = $bookData;
    }

    public function eBookUpdated($eBookData)
    {
        $this->eBook = $eBookData;
    }

    public function mount()
    {
        $this->book = ['title' => '', 'author' => ''];
        //$this->eBook = ['title' => '', 'author' => ''];
        $this->eBook = new EBook([
            'title' => '',
            'author' => '',
        ]);
    }

    public function render()
    {
        return view('livewire.parent-component');
    }
}

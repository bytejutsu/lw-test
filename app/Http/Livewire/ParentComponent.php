<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\EBook;
use Livewire\Component;

class ParentComponent extends Component
{
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

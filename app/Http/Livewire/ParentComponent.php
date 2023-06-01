<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class ParentComponent extends Component
{
    public $book = ['title' => '', 'author' => ''];
    public $eBook = ['title' => '', 'author' => ''];

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
        $this->eBook = ['title' => '', 'author' => ''];
    }

    public function render()
    {
        return view('livewire.parent-component');
    }
}

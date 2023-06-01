<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class ParentComponent extends Component
{
    public $book = ['title' => '', 'author' => ''];

    protected $listeners = ['bookUpdated'];


    public function bookUpdated($bookData)
    {
        $this->book = $bookData;
    }

    public function mount()
    {
        $this->book = ['title' => '', 'author' => ''];
    }

    public function render()
    {
        return view('livewire.parent-component');
    }
}

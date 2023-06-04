<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BooksSearchListSettingsComponent extends Component
{
    public bool $showBookImage;
    public int $maxBooks;

    public function mount(bool $showBookImage, int $maxBooks)
    {
        $this->showBookImage = $showBookImage;
        $this->maxBooks = $maxBooks;
    }

    public function render()
    {
        return view('livewire.books-search-list-settings-component');
    }
}

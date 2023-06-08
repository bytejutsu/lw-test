<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BookSearchListSettingsComponent extends Component
{
    public bool $showBookImage;
    public int $maxBooks;

    public function mount()
    {
        $this->showBookImage = true;
        $this->maxBooks = 5;
    }

    public function updatedShowBookImage()
    {
        $this->notifyAboutShowBookImage();
    }

    public function updatedMaxBooks()
    {
        $this->notifyAboutMaxBooks();
    }

    private function notifyAboutShowBookImage()
    {
        $this->emitTo('book-list-component', 'showBookImageUpdated', $this->showBookImage);
    }

    private function notifyAboutMaxBooks()
    {
        $this->emitTo('book-list-component', 'maxBooksUpdated', $this->maxBooks);
    }

    public function notify()
    {
        $this->notifyAboutShowBookImage();
        $this->notifyAboutMaxBooks();
    }

    public function render()
    {
        return view('livewire.book-search-list-settings-component');
    }
}

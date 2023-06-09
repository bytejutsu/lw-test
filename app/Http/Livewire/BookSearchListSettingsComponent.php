<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BookSearchListSettingsComponent extends Component
{
    public bool $showBookImage;
    public int $maxBooks;

    protected $rules = [
        'maxBooks' => 'required|int|between:1,5', //in order for the range validation to work the type validation int
                                                  //must be specified
        'showBookImage' => 'required|boolean'
    ];

    public function mount()
    {
        $this->showBookImage = true;
        $this->maxBooks = 5;
    }

    public function updatedShowBookImage()
    {
        $this->validateOnly('showBookImage');

        $this->notifyAboutShowBookImage();
    }

    public function updatedMaxBooks()
    {
        $this->validateOnly('maxBooks');

        //$this->validate();

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

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

    public function updatedShowBookImage($value)
    {
        $this->validateOnly('showBookImage');

        session(['showBookImage' => $value]);

        $this->notifyAboutSettings();
    }

    public function updatedMaxBooks($value)
    {
        $this->validateOnly('maxBooks');

        session(['maxBooks' => $value]);

        $this->notifyAboutSettings();
    }

    private function notifyAboutSettings()
    {
        $this->emitTo('book-list-component', 'settingsUpdated', $this->maxBooks, $this->showBookImage);
    }

    public function notify()
    {
        $this->notifyAboutSettings();
    }

    public function render()
    {
        return view('livewire.book-search-list-settings-component');
    }
}

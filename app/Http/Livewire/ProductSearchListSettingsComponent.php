<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductSearchListSettingsComponent extends Component
{
    public bool $showProductImage;
    public int $limit;

    protected $rules = [
        'limit' => 'required|int|between:1,5', //in order for the range validation to work the type validation int
                                                  //must be specified
        'showProductImage' => 'required|boolean'
    ];

    public function mount()
    {
        $this->showProductImage = true;
        $this->limit = 5;
    }

    public function updatedShowProductImage($value)
    {
        $this->validateOnly('showProductImage');

        session(['showProductImage' => $value]);

        $this->notifyAboutSettings();
    }

    public function updatedLimit($value)
    {
        $this->validateOnly('limit');

        session(['limit' => $value]);

        $this->notifyAboutSettings();
    }

    private function notifyAboutSettings()
    {
        $this->emitTo('product-list-component', 'settingsUpdated', $this->limit, $this->showProductImage);
    }

    public function notify()
    {
        $this->notifyAboutSettings();
    }

    public function render()
    {
        return view('livewire.product-search-list-settings-component');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\WireableProduct;
use App\Models\Marker;
use App\Services\SharedStateService\SharedStateService;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ProductChildComponent extends Component
{
    public WireableProduct $product;

    //rules are not necessary for wireable model

    // we added those rules to test if they can be bypassed when
    // the user alters the book.title and book.author from the local storage
    // as now the book.title and book.author are bound with alpine.js properties
    // that are stored in the browser locally
    //
    protected $rules = [
      'product.*' => 'string|max:16' //use * to validate all attributes of the book
    ];

    public function mount()
    {
        $this->product = new WireableProduct("phone", "Matt Stauffer");
    }

    public function updatedProduct($value)
    {

        $this->validateOnly('product.*'); //this works only because we used 'book.*' in the rules if not it won't work

        session(['product' => $this->product]);

        $this->notifyAboutProduct();

    }

    private function notifyAboutProduct()
    {
        //todo: maybe track the components names with constants or enums !!!!

        $this->emitTo('parent-component', 'productUpdated', $this->product);

        $this->emitTo('product-list-component', 'productUpdated', $this->product);

    }

    public function notify()
    {
        $this->notifyAboutProduct();
    }

    public function render()
    {
        return view('livewire.product-child-component');
    }
}

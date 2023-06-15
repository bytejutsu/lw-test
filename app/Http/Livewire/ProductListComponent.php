<?php

namespace App\Http\Livewire;

use App\Jobs\FetchProductsJob;
use App\Models\WireableProduct;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ProductListComponent extends Component
{
    //todo: warning!!! passing an array of wireable objects to the view in livewire is buggy !!! doesn't work properly
    //todo: maybe $wireableBooks needs to be of type Wireable !?
    //public array $wireableBooks;
    public array $arrayProducts;


    public bool $showProductImage;

    protected $listeners = [
        'echo:products,ProductsFetchedEvent' => 'onProductsFetched',
        'productUpdated',
        'settingsUpdated'
    ];

    public function mount()
    {
        //dispatch(new FetchBooksJob('', 5));
    }


    public function onProductsFetched($value)
    {
        $products = $value["products"];

        $this->arrayProducts = $products;
    }

    public function productUpdated($productData)
    {
        //this is an event listener so the data it receives is serialized and needs to be converted back to an array of objects

        $productTitle = $productData['title'];
        $limit = session('limit', 5);

        try{
            dispatch(new FetchProductsJob($productTitle, $limit));
            //dump($bookData);
            Log::debug('productUpdated is fired, $productData is: ' . print_r($productData, true));
        }catch(\Exception $e){
            dd($e->getMessage());
        }

    }


    //TODO: report bug on livewire repo!: leave the following two listener methods empty
    // and the books property will no longer be an array of wireable objects
    // and instead it will be an array of arrays


    public function settingsUpdated($limitData, $showProductImageData)
    {

        $limit = $limitData;
        $showProductImage = $showProductImageData;

        $this->showProductImage = $showProductImage;

        $product = session('product', new WireableProduct('',''));

        $productTitle = $product->title;

        try{
            dispatch(new FetchProductsJob($productTitle, $limit));
        }catch(\Exception $e){
            dd($e->getMessage());
        }

    }


    public function render()
    {
        return view('livewire.product-list-component');
    }
}

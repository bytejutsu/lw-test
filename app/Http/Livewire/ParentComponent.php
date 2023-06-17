<?php

namespace App\Http\Livewire;

use App\Jobs\SendProductListEmailJob;
use App\Models\Marker;
use App\Models\WireableProduct;
use App\Services\EmailService\EmailService;
use App\Services\EncryptionService\EncryptionService;
use App\Services\ProductService\ProductService;
use App\Services\SharedStateService\SharedStateService;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class ParentComponent extends Component
{

    public array $aBook;
    public array $markers;
    public Marker $marker;
    public WireableProduct $product;

    public string $email;

    //NOTE: !!!!! all private state will not persist because it is private: so after listener fires it will be lost !!!!!
    // you have to make it public so it persists even you are using it internally only


    //rules is MANDATORY!!! for the eloquent model property to work properly
    // !!!! otherwise you on refresh the model data will DISAPPEAR and YOU WILL NOT !!! get an ERROR !!!!
    protected $rules = [
        'eBook.title' => 'string',
        'eBook.author' => 'string',

        'email' => 'required|email',
    ];


    protected $listeners = [
        'echo:emails,ProductListEmailSentEvent' => 'onProductListEmailSent',
        'aBookUpdated',
        'eBookUpdated',
        'productUpdated'
    ];

    public function aBookUpdated($aBookData)
    {
        //aBookData is an array because it is sent via an emit event => serialized
        $this->aBook = $aBookData;
    }

    public function eBookUpdated($eBookData)
    {
        //eBookData is an array because it is sent via an emit event => serialized
        $this->markers->title = $eBookData['title'];
        $this->markers->author = $eBookData['author'];
    }

    public function productUpdated($productData)
    {
        //bookData is an array because it is sent via an emit event => serialized

        if(isset($this->product)){
            $this->product->title = $productData['title'];
            $this->product->author = $productData['author'];
        }else{
            $this->product = new WireableProduct($productData['title'], $productData['author']);
        }

    }

    public function getProductTitleLetterCountProperty()
    {
        return strlen($this->product->title);
    }


    public function getMarkersCountProperty()
    {
        return Marker::all()->count();
    }

    public function getABookTitleLetterCountProperty()
    {
        return strlen($this->aBook['title']);
    }

    public function getABookTitleProperty()
    {
        return self::getEncryptionService()->encrypt($this->aBook['title'], 2);
        //todo: however i think the value of $this->aBook itself is not updated => so its title too X!!!!
    }

    public function handleSendClick()
    {

        $this->validate();

        $emailService = app(\App\Services\EmailService\EmailService::class);

        $productService = app(\App\Services\ProductService\ProductService::class);

        $this->sendProductListEmail($emailService, $productService);
    }

    private function sendProductListEmail(EmailService $emailService, ProductService $productService)
    {
        $product =  session('product', new WireableProduct('',''));
        $showProductImage = session('showProductImage', true);
        $limit = session('limit', 5);

        $products = [];

        try{
            $products = $productService->getProducts($product->title, $limit);
        }catch(\Exception $e){
            dd($e->getMessage());
        }

        try{
            //$emailService->sendProductListEmail();
            SendProductListEmailJob::dispatch($this->email, $products, $showProductImage);
        }catch(\Exception $e){
            dd($e->getMessage());
        }


    }

    public function onProductListEmailSent($value)
    {
        // Clear the email input field after sending the email
        //todo: find out why this doesn't work an raises an error //$this->reset('email');
        $this->email = '';

        $message = $value['message'];

        //dd($message);

        if($message === "email sent successfully")
        {
            Toaster::success($message);
        }else{
            Toaster::error($message);
        }
    }

    public function mount(SharedStateService $sharedStateService) //todo: this must be called at least one time so SharedStateService resolves :(
    {
        $this->fill([
            'aBook' => ['title' => 'initial aBook title from parent', 'author' => 'initial aBook author from parent'],
            'markers' => Marker::all()->toArray(),
            'marker' => Marker::first(),
            //'book' => new Book('', '')
        ]);

        $this->email = "";

    }

    public function render()
    {
        return view('livewire.parent-component');
    }

    //todo: clear/destroy the shared state when the parent component gets dismounted/destroyed

    /*
     * alternative method to use a service inside a livewire component
     *
    protected static $serviceInstance;

    public static function getServiceInstance() {

        if (!isset(self::$serviceInstance)) {
            self::$serviceInstance = new Service();
        }

        return self::$serviceInstance;
    }
     */

    //-----------------------------------------------------------
    protected static $encryptionService;

    public static function getEncryptionService() {

        if (!isset(self::$encryptionService)) {
            self::$encryptionService = new EncryptionService();
        }

        return self::$encryptionService;
    }
    //----------------------------------------------------------

    /*
    protected static $sharedStateService;

    public static function getSharedStateService() {

        if (!isset(self::$sharedStateService)) {
            self::$sharedStateService = SharedStateService::getInstance();
        }

        return self::$sharedStateService;
    }
    */
}

<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\EBook;
use App\Services\BookService;
use App\Services\EmailService\EmailService;
use App\Services\EncryptionService;
use App\Services\SharedStateService\SharedStateService;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class ParentComponent extends Component
{

    public array $aBook;
    public EBook $eBook;
    public Book $book;

    public string $email;

    //NOTE: !!!!! all private state will not persist because it is private: so after listener fires it will be lost !!!!!
    // you have to make it public so it persists even you are using it internally only


    //rules is MANDATORY!!! for the eloquent model property to work properly
    // !!!! otherwise you on refresh the model data will DISAPPEAR and YOU WILL NOT !!! get an ERROR !!!!
    protected $rules = [
        'eBook.title' => 'string',
        'eBook.author' => 'string',
    ];


    protected $listeners = ['aBookUpdated','eBookUpdated','bookUpdated'];

    public function aBookUpdated($aBookData)
    {
        //aBookData is an array because it is sent via an emit event => serialized
        $this->aBook = $aBookData;
    }

    public function eBookUpdated($eBookData)
    {
        //eBookData is an array because it is sent via an emit event => serialized
        $this->eBook->title = $eBookData['title'];
        $this->eBook->author = $eBookData['author'];
    }

    public function bookUpdated($bookData)
    {
        //bookData is an array because it is sent via an emit event => serialized
        $this->book->title = $bookData['title'];
        $this->book->author = $bookData['author'];
    }

    public function getBookTitleLetterCountProperty()
    {
        return strlen($this->book->title);
    }


    public function getEBookTitleLetterCountProperty()
    {
        return strlen($this->eBook->title);
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

    public function sendBookListEmail(EmailService $emailService)
    {

        $books = SharedStateService::get('books');

        //dd($books);

        //$books = BookService::getBooks($this->book->title);

        try{
            $emailService->sendBookListEmail($books, $this->email);
        }catch(\Exception $e){
            dd($e->getMessage());
        }

        // Clear the email input field after sending the email
        $this->email = '';

        // Alternatively, you can clear the books data if needed
        // $sharedStateService->setSharedData('books', []);
    }

    public function mount(SharedStateService $sharedStateService) //todo: this must be called at least one time so SharedStateService resolves :(
    {

        $this->fill([
            'aBook' => ['title' => 'initial aBook title from parent', 'author' => 'initial aBook author from parent'],
            'eBook' => EBook::inRandomOrder()->first(),
            'book' => new Book('Laravel', 'Matt Stauffer')
        ]);

        SharedStateService::put('books', BookService::getBooks($this->book->title));

        $this->email = "";
    }

    public function render()
    {
        return view('livewire.parent-component');
    }

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

<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\EBook;
use Livewire\Component;

class ParentComponent extends Component
{
    /*
     * Error:
     * Livewire component's [parent-component] public property [book] must be of type:
     * [numeric, string, array, null, or boolean].
     * Only protected or private properties can be set as other types because JavaScript doesn't need to access them.
     * EndError.
     *
     * => so public Book $book will not work because the view doesn't support non-eloquent objects:
     * because livewire only supports eloquent models to be passed as php objects to the view
     *
     */
    public $book;

    public $eBook;
    //public EBook $eBook; this property state value doesn't persist after rerendering :( ! very sad ! we must use an array


    //NOTE: !!!!! all private state will not persist because it is private: so after listener fires it will be lost !!!!!
    // you have to make it public so it persists even you are using it internally only

    //private Book $internalBook; //typing this property gives the error: Typed property must not be accessed before initialization
    //public $internalBook; //so this is not allowed because when public internalBook can't be of type Book

    //even as an eloquent model object and public this state will not persist when an event listener fires after an emit
    //public ?EBook $internalEBook = null; //do this to prevent the error: Typed property must not be accessed before initialization
    public $internalEBook; // best way is to handle it as an array

    //private array $internalABook; //internal array book
    public $internalABook; //omitted type as array



    //public int $bookTitleLetterCount; // X don't declare properties for computed properties
    //public int $eBookTitleLetterCount; // X don't declare properties for computed properties

    protected $listeners = ['bookUpdated','eBookUpdated'];


    public function bookUpdated($bookData)
    {
        //dd(gettype($bookData)); // => array: can't be cast or typehint to something else because emit from child serializes to array

        $this->book = $bookData;


        $this->internalABook = ['title' => $bookData['title'], 'author' => $bookData['author']];

        //$this->internalBook = new Book(title: $bookData['title'], author: $bookData['author']); // not possible

    }

    public function eBookUpdated($eBookData)
    {
        //dd(gettype($eBookData)); // => array: can't be cast or typehint to something else because emit from child serializes to array

        $this->eBook = $eBookData;  //also works but the property eBook should be declared as array or omit the type but not EBook

        /*
         * because both assigning the eBook as an array or eloquent model work: here you can choose
         * but your choice will affect your decision on how you declare the type of the property of eBook (array or EBook)
         * and in the view then how you call its attributes ($eBook['author'] or $eBook->author)
         *
         * => so at the end it boils down to how livewire supports displaying objects in the view:
         * Eloquent model are supported as every normal php object inside blade (can both be treated as object or array)
         *
         * Non-eloquent models are not supported by laravel to be passed to the view and therefore need to be converted to arrays
         *
         * emit always serializes the object passed to it
         */

        /*
        $this->eBook = new EBook([
            'title' => $eBookData['title'],
            'author' => $eBookData['author']
        ]);
        */

        /*
        $this->eBook->title = $eBookData['title'];
        $this->eBook->author = $eBookData['author'];
        */

        //
        //------------------------------------------------------------------------
        //

        //dd($this->internalEBook); //null so apparently eloquent model object internalEBook doesn't persis too

        /*
            $this->internalEBook->title = $eBookData['title'];
            $this->internalEBook->author = $eBookData['author'];
        */

        //$this->internalEBook = new EBook(['title' => $eBookData['title'], 'author' => $eBookData['author']]); //will not persist

        $this->internalEBook = ['title' => $eBookData['title'], 'author' => $eBookData['author']];

    }


    /*
     * not possible since internalBook is public and can't be of type Book
    public function getBookTitleLetterCountProperty()
    {
        return strlen($this->internalBook?->title);
    }
    */

    public function getEBookTitleLetterCountProperty()
    {
        //return strlen($this->internalEBook?->title); //will not persist

        if(!is_null($this->internalEBook)) return strlen($this->internalEBook['title']);
    }

    public function getABookTitleLetterCountProperty()
    {
        if(!is_null($this->internalABook)) return strlen($this->internalABook['title']);

        //return strlen($this->internalABook['title']);
    }

    public function mount()
    {
        // dd('parent mount run first);

        $this->book = ['title' => 'initial book title from parent', 'author' => 'initial book author from parent'];

        //dd(EBook::inRandomOrder()->first()->attributesToArray());

        //$this->eBook = EBook::inRandomOrder()->first()->attributesToArray();
        //$this->eBook = ['title' => 'initial eBook title from parent', 'author' => 'initial ebook author from parent']; //in case eBook was not typehint or declared as array

        $this->eBook = EBook::inRandomOrder()->first()->attributesToArray();


        //dd($this->eBook);


        //$this->bookTitleLetterCount = 0; // X don't initialize a computed property in mount it will break the functioning
        //$this->eBookTitleLetterCount = 0; // X don't initialize a computed property in mount it will break the functioning

        //$this->internalBook = new Book($this->book['title'],$this->book['author']); //not possible because internalBook must be public

        /*
         * will not persist
        $this->internalEBook = new EBook([
            'title' => $this->eBook['title'],
            'author' => $this->eBook['author'],
        ]);
        */

        $this->internalEBook = ['title' => $this->eBook['title'], 'author' => $this->eBook['author']];

        $this->internalABook = ['title' => $this->book['title'], 'author' => $this->eBook['author']];

        /*
        $this->eBook = new EBook([
            'title' => 'initial eBook title',
            'author' => 'initial eBook author',
        ]);
        */

        //dd(gettype($this->eBook)); // => object
    }

    //todo: make the child component perform initial computation with the passed data from parent in mount + make wirable model

    public function render()
    {
        return view('livewire.parent-component');
    }
}

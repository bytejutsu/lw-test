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

    protected $listeners = ['bookUpdated','eBookUpdated'];


    public function bookUpdated($bookData)
    {
        //dd(gettype($bookData)); // => array: can't be cast or typehint to something else because emit from child serializes to array

        $this->book = $bookData;
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
    }

    public function mount()
    {
        $this->book = ['title' => 'initial book title', 'author' => 'initial book author'];
        $this->eBook = ['title' => 'initial book title', 'author' => 'initial book author']; //in case eBook was not typehint or declared as array

        /*
        $this->eBook = new EBook([
            'title' => 'initial eBook title',
            'author' => 'initial eBook author',
        ]);
        */

        //dd(gettype($this->eBook)); // => object
    }


    public function render()
    {
        return view('livewire.parent-component');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\EBook;
use Livewire\Component;

class EBookChildComponent extends Component
{
    public EBook $eBook;

    //rules is necessary for the eloquent model property otherwise you get an error
    protected $rules = [
        'eBook.title' => 'string',
        'eBook.author' => 'string',
    ];

    public function mount(EBook $eBook)
    {
        $this->eBook = $eBook;
    }

    public function updatedEBook()
    {
        $this->emitUp('eBookUpdated', $this->eBook);

    }

    public function render()
    {
        return view('livewire.e-book-child-component');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MapsComponent extends Component
{
    public array $markers;

    public function mount(array $markers)
    {
        //dd($markers);
        $this->markers = $markers;
    }

    public function render()
    {
        return view('livewire.maps-component');
    }
}

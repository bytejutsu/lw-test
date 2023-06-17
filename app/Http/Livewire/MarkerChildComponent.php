<?php

namespace App\Http\Livewire;

use App\Models\Marker;
use Livewire\Component;

class MarkerChildComponent extends Component
{
    public Marker $marker;

    //rules is necessary for the eloquent model property otherwise you get an error

    /*

    make some regex consts

    const $latRegex = '/^[-]?((([0–8]?[0–9])(\.(\d{1,8}))?)|(90(\.0+)?))$/';
    const $longRegex = '/^[-]?((((1[0–7][0–9])|([0–9]?[0–9]))(\.(\d{1,8}))?)|180(\.0+)?)$/';

    */

    protected $rules = [
        'marker.lat' => 'required|regex:/.*/',
        'marker.long' => 'required|regex:/.*/',
    ];

    public function mount(Marker $marker)
    {
        $this->marker = $marker;
    }

    public function updatedMarker()
    {
        $this->validateOnly('marker.lat');
        $this->validateOnly('marker.long');

        $this->emitUp('markerUpdated', $this->marker);
    }

    public function render()
    {
        return view('livewire.marker-child-component');
    }
}

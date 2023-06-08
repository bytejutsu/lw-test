<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

trait ManagesState
{
    public array $state;
    public string $cacheKey;
    public string $routeName;

    public function mountManagesState()
    {
        $this->cacheKey = sprintf(
            '%s.state',
            auth()->user()->id,
        );
        $this->routeName = Route::currentRouteName();
        $this->state = Cache::get($this->cacheKey)[$this->routeName] ?? [];
    }

    public function bootedManagesState() {
        foreach($this->statefulProps as $prop) {
            $this->{$prop} = $this->state[$prop] ?? $this->{$prop} ?? '';
        }
    }

    public function updatedManagesState($prop)
    {
        if(in_array($prop, $this->statefulProps)) {
            $this->setState([
                $prop => $this->{$prop}
            ]);
        }
    }

    public function setState($update)
    {
        $mutatingState = Cache::get($this->cacheKey) ?? [];
        $mutatingState[$this->routeName] = array_merge(
            $mutatingState[$this->routeName] ?? [],
            $update
        );
        Cache::forever($this->cacheKey, $mutatingState);
    }
}

/*
 *


<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\ManagesState;

class Index extends Component
{
    use WithPagination, ManagesState;

    public string $filter;
    public string $paginating = '10';
    public array $statefulProps = ['filter', 'paginating'];

    ....
}

 *
 */

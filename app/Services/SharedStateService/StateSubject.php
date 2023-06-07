<?php

namespace App\Services\SharedStateService;

use SplSubject;
use SplObserver;

class StateSubject implements SplSubject {

    private $observers;
    private $state;

    private string $key;

    public function __construct(string $key, $state, array $observers = []) //maybe implement the immutable pattern => setters return new Objects
    {
        $this->key = $key;    //should key be immutable ? required ?
        $this->state = $state; //no using setState because we don't want to notify on initialization
        $this->observers = $observers;

    }

    public function attach(SplObserver $observer) {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer) {
        $index = array_search($observer, $this->observers);
        if ($index !== false) {
            unset($this->observers[$index]);
        }
    }

    public function notify() {


        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {

        $this->state = $state;
        $this->notify();
    }

    public function getObservers()
    {
        return $this->observers;
    }

    // Additional methods and logic specific to the subject
    public function getKey(): string
    {
        return $this->key;
    }
}

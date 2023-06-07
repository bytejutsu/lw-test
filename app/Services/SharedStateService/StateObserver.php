<?php

namespace App\Services\SharedStateService;

use Livewire\Component;
use SplSubject;
use SplObserver;

abstract class StateObserver extends Component implements SplObserver {

    protected array $observables = [];

    public function update(SplSubject $subject): void
    {
        dd('update is called form inside the StateObserver');

        //$state = $subject->getState();
        // Handle the update from the subject

        $methodName = "{$subject->getKey()}Updated";

        if (method_exists($this, $methodName)) {
            $this->{$methodName}();
        } else {
            throw new \Exception("Method $methodName does not exist.\n");
        }

    }

    // Additional methods and logic specific to the observer

    public function attachSubjects(array $subjects)
    {
        foreach ($subjects as $subject)
        {
            $s = SharedStateService::getStateSubjectInstance($subject);

            $s->attach($this);

        }
    }
}

<?php

namespace App\Models;

use Livewire\Wireable;

class WireableBook implements Wireable
{
    public $title;
    public $author;

    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;

    }


    public function toLivewire()
    {
        return $this->toArray();
    }

    public static function fromLivewire($value)
    {
        /*

        By using new static($params);
        the method ensures that when called from a subclass,
        it creates an instance of that subclass rather than always creating an instance of 'WireableBook'.
        This behavior is possible due to late static binding.

         */

        return new static($value['title'], $value['author']);
    }

    public function toArray()
    {
        return ['title' => $this->title, 'author' => $this->author];
    }
}

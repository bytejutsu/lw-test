<?php

namespace App\Models;

use Livewire\Wireable;

class Book implements Wireable
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
        return new static($value['title'], $value['author']);
    }

    public function toArray()
    {
        return ['title' => $this->title, 'author' => $this->author];
    }
}

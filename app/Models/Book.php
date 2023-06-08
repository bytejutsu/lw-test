<?php

namespace App\Models;

class Book
{
    public $title;
    public $author;

    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;

    }

    /*

    public function toArray()
    {
        return ['title' => $this->title, 'author' => $this->author];
    }

    */
}

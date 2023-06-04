<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\Http;

class BookService
{
    public static function getBooks($title): array
    {
        if(!empty($title)) {
            // Make an API request to fetch the books
            $response = Http::get("https://api.itbook.store/1.0/search/{$title}/1");

            // Check if the request was successful
            if ($response->successful()) {
                $allBooksData = $response->json()['books'];

                //minimize the array to max 10 elements
                $booksData = array_splice($allBooksData, 0, 5);

                // Map the JSON data to an array of Book objects
                $books = array_map(function ($bookData) {
                    return new Book($bookData['title'], 'not provided');
                }, $booksData);

                return $books;
            }

            // If the request was not successful, you can handle the error accordingly
            // For example, you can throw an exception or return an empty array
            return [];
        }

        return [];
    }
}

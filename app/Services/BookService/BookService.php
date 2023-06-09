<?php

namespace App\Services\BookService;

use App\Models\WireableBook;
use Illuminate\Support\Facades\Http;

class BookService
{
    public static function getWireableBooks($bookTitle, $maxBooks = 5): array
    {
        if(!empty($bookTitle)) {
            // Make an API request to fetch the books
            $response = Http::get("https://api.itbook.store/1.0/search/{$bookTitle}/1");

            // Check if the request was successful
            if ($response->successful()) {
                $allBooksData = $response->json()['books'];

                //minimize the array to max 10 elements
                $booksData = array_splice($allBooksData, 0, $maxBooks);

                // Map the JSON data to an array of Book objects
                $books = array_map(fn ($bookData) => new WireableBook($bookData['title'], 'not provided'), $booksData);

                return $books;
            }

            // If the request was not successful, you can handle the error accordingly
            // For example, you can throw an exception or return an empty array

            return [];
        }

        return [];
    }

    public static function getArrayBooks($bookTitle, $maxBooks = 5): array
    {
        if(!empty($bookTitle)) {
            // Make an API request to fetch the books
            $response = Http::get("https://api.itbook.store/1.0/search/{$bookTitle}/1");

            // Check if the request was successful
            if ($response->successful()) {
                $allBooksData = $response->json()['books'];

                //minimize the array to max 10 elements
                $booksData = array_splice($allBooksData, 0, $maxBooks);

                // Map the JSON data to an array of Book objects

                //$books = array_map(fn ($bookData) => [$bookData['title'], 'not provided'], $booksData);

                //dd($booksData);

                return $booksData;
            }

            // If the request was not successful, you can handle the error accordingly
            // For example, you can throw an exception or return an empty array

            return [];
        }

        return [];
    }

    public static function getArrayBooksWithImage($bookTitle, $maxBooks = 5)
    {
        $apiUrl = 'https://api.itbook.store/1.0';
        $searchEndpoint = "/search/{$bookTitle}/1";
        $searchResponse = Http::get($apiUrl . $searchEndpoint);

        if ($searchResponse->failed()) {
            return []; // handle error here, maybe log or throw exception
        }

        $searchResult = $searchResponse->json();

        $books = [];
        foreach($searchResult['books'] as $book) {
            $bookInfoEndpoint = "/books/{$book['isbn13']}";
            $bookInfoResponse = Http::get($apiUrl . $bookInfoEndpoint);

            if ($bookInfoResponse->failed()) {
                continue; // handle error here, maybe log or throw exception
            }

            $bookInfo = $bookInfoResponse->json();
            $books[] = ['title' => $bookInfo['title'], 'image' => $bookInfo['image']];
        }

        //dd($books);

        return array_splice( $books, 0, $maxBooks);
    }
}

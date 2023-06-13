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

    public static function getArrayBooks($productTitle, $limit = 5): array
    {
        if(!empty($productTitle)) {
            // Make an API request to fetch the products
            $response = Http::get("https://api.itbook.store/1.0/search/{$productTitle}/1");

            // Check if the request was successful
            if ($response->successful()) {
                $allBooksData = $response->json()['books'];

                //minimize the array to max 10 elements
                $booksData = array_splice($allBooksData, 0, $limit);

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

    public static function getArrayBooksWithImage($productTitle, $limit = 5, $showProductImage = true)
    {
        $apiUrl = 'https://dummyjson.com/products';
        $searchEndpoint = "/search?q={$productTitle}&limit={$limit}&select=title,images";
        $searchResponse = Http::get($apiUrl . $searchEndpoint);

        if ($searchResponse->failed()) {
            return []; // handle error here, maybe log or throw exception
        }

        $searchResult = $searchResponse->json();

        $productsData = $searchResult["products"];

        $products = array_map(fn ($productData) => ['title' => $productData['title'],'image' => $productData['images'][0]], $productsData);

        //dd($products);

        return $products;
    }

    /*
    public static function getArrayBooksWithImage($bookTitle, $maxBooks = 5)
    {

        return [
                    ['title' => 'book title 1','image' => 'book image 1'],
                    ['title' => 'book title 2','image' => 'book image 2'],
                    ['title' => 'book title 3','image' => 'book image 3'],
                ];


    }
    */
}

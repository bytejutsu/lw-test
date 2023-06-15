<?php

namespace App\Services\ProductService;

use App\Models\WireableProduct;
use Illuminate\Support\Facades\Http;

class ProductService
{

    public function getProducts($productTitle, $limit = 5, $showProductImage = true): array
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

}

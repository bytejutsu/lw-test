<?php

namespace App\Jobs;

use App\Events\ProductsFetchedEvent;
use App\Services\ProductService\ProductService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchProductsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $productTitle;
    protected $limit;

    /**
     * Create a new job instance.
     */
    public function __construct($productTitle, $limit)
    {
        //
        $this->productTitle = $productTitle;
        $this->limit = $limit;
    }

    /**
     * Execute the job.
     */
    public function handle(ProductService $productService): void
    {
        $products = $productService->getProducts($this->productTitle, $this->limit);
        //event(new ProductsFetchedEvent($products));
        ProductsFetchedEvent::dispatch($products);
    }
}

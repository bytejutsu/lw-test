<?php

namespace App\Jobs;

use App\Events\BooksFetchedEvent;
use App\Services\BookService\BookService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchBooksJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $bookTitle;
    protected $maxBooks;

    /**
     * Create a new job instance.
     */
    public function __construct($bookTitle, $maxBooks)
    {
        //
        $this->bookTitle = $bookTitle;
        $this->maxBooks = $maxBooks;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $books = BookService::getArrayBooksWithImage($this->bookTitle, $this->maxBooks);
        //event(new BooksFetchedEvent($books));
        BooksFetchedEvent::dispatch($books);
    }
}

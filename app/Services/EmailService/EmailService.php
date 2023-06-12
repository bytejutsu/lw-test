<?php

namespace App\Services\EmailService;

use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendBookListEmail(string $email, array $books, bool $showBookImage)
    {
        if (empty($books)) {
            // Handle the case when no books are available or the search hasn't been performed yet
            return;
        }

        $emailData = [
            'email' => $email,
            'books' => $books,
            'showBookImage' => $showBookImage,
        ];

        Mail::to($email)->send(new BookListEmail($emailData));
    }

}

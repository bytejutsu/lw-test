<?php

namespace App\Services\EmailService;

use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendBookListEmail(array $books, string $email)
    {
        if (empty($books)) {
            // Handle the case when no books are available or the search hasn't been performed yet
            return;
        }

        $emailData = [
            'email' => $email,
            'books' => $books,
        ];

        Mail::to($email)->send(new BookListEmail($emailData));
    }

}

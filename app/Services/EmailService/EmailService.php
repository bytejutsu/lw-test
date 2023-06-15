<?php

namespace App\Services\EmailService;

use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendProductListEmail(string $email, array $products, bool $showProductImage)
    {
        if (empty($products)) {
            // Handle the case when no books are available or the search hasn't been performed yet
            return;
        }

        $emailData = [
            'email' => $email,
            'products' => $products,
            'showProductImage' => $showProductImage,
        ];

        Mail::to($email)->send(new ProductListEmail($emailData));
    }

}

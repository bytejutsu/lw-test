<?php

namespace App\Jobs;

use App\Events\ProductListEmailSentEvent;
use App\Services\EmailService\EmailService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendProductListEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $products;
    protected $showProductImage;

    /**
     * Create a new job instance.
     */
    public function __construct(string $email ,array $products, bool $showProductImage)
    {
        $this->email = $email;
        $this->products = $products;
        $this->showProductImage = $showProductImage;
    }

    /**
     * Execute the job.
     */
    public function handle(EmailService $emailService): void
    {
        $message = 'email sent successfully';

        try {
            $emailService->sendProductListEmail($this->email, $this->products, $this->showProductImage);
        } catch (\Exception $e){
            $message = 'email sending failed';
        }

        ProductListEmailSentEvent::dispatch($message);
    }
}

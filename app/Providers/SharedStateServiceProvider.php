<?php

namespace App\Providers;

use App\Services\SharedStateService\SharedStateService;
use Illuminate\Support\ServiceProvider;

class SharedStateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SharedStateService::class, function ($app) {
            return SharedStateService::getInstance();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

}

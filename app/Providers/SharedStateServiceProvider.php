<?php

namespace App\Providers;

use App\Services\SharedStateService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class SharedStateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SharedStateService::class, function ($app) {
            return new SharedStateService();
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

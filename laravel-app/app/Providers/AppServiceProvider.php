<?php

namespace App\Providers;

use App\Models\Car;
use App\Models\Client;
use App\Observers\CarObserver;
use App\Observers\ClientObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Observer Client
        Client::observe(ClientObserver::class);

        // Observer Car
        Car::observe(CarObserver::class);
    }
}

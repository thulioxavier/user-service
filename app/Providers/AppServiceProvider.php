<?php

namespace App\Providers;

// use App\Repositories\IAddressRepository;

use App\Implementations\AddressImplementation;
use App\Implementations\ClientImplementation;
use App\Repositories\IAddressRepository;
use App\Repositories\IClientRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IClientRepository::class, ClientImplementation::class);
        $this->app->bind(IAddressRepository::class, AddressImplementation::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

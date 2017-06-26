<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Support\CartManager;
use App;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('cart', CartManager::class);
    }
}

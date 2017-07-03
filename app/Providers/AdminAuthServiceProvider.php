<?php
namespace App\Providers;

use App\Support\AdminAuthManager;
use Illuminate\Auth\AuthServiceProvider as UserAuthServiceProvider;

class AdminAuthServiceProvider extends UserAuthServiceProvider
{
    protected function registerAuthenticator()
    {
        $this->app->singleton('admin.auth', function ($app) {
            return new AdminAuthManager($app);
        });
    }
}

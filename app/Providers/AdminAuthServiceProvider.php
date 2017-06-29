<?php
namespace App\Providers;

use App\Support\AdminAuthManager;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\AuthServiceProvider as AuthServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Admin;

class AdminAuthServiceProvider extends AuthServiceProvider
{
    protected function registerAuthenticator()
    {
        $this->app->singleton('admin.auth', function ($app) {
            return new AdminAuthManager($app);
        });
    }
}

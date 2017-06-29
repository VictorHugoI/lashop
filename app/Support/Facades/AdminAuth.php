<?php

namespace App\Support\Facades;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;

class AdminAuth extends Auth
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'admin.auth';
    }
}

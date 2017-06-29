<?php
namespace App\Support;

use \Illuminate\Auth\AuthManager;

/**
 * Created by PhpStorm.
 * User: hoangtien
 * Date: 28/06/2017
 * Time: 16:14
 */
class AdminAuthManager extends AuthManager
{
    /**
     * Get the default authentication driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']['auth.admin.guard'];
    }
}

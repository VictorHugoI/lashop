<?php

namespace App\Http\Middleware;

use Closure;
use AdminAuth;

class AdminRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (AdminAuth::check()) {
            return redirect('/admin/home');
        }

        return $next($request);
    }
}

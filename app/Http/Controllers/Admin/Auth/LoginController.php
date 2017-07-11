<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Admin;
use AdminAuth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/home';

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function logout(Request $request)
    {
        // dd($request);
        $this->guard()->logout();
        // $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('admin.login');
    }

    protected function guard()
    {
        return AdminAuth::guard();
    }
}

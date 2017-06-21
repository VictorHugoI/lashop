<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

});
Route::group(['namespace' => 'Customer', 'prefix' => 'customer'], function () {

});

Route::group(['middleware' => 'web'], function () {
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin' ], function () {
        Route::get('home', 'HomeController@index')->middleware('admin.auth');
        Route::group(['middleware' => 'admin.guest'], function () {
            Route::get('/', 'Auth\LoginController@showLoginForm');
            Route::get('login', 'Auth\LoginController@showLoginForm');
            Route::post('login', 'Auth\LoginController@login')->name('admin.login');
            Route::get('register', 'Auth\RegisterController@showRegistrationForm');
            Route::post('register', 'Auth\RegisterController@register');
        });

        Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
    });
});

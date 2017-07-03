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
    return view('customers.master');
})->name('home');

Route::group(['middleware' => 'web'], function () {
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin' ], function () {
        Route::get('home', 'HomeController@index')->middleware('admin.auth');

        Route::group(['middleware' => 'admin.guest'], function () {
            Route::get('/', 'Auth\LoginController@showLoginForm');
            Route::get('login', 'Auth\LoginController@showLoginForm');
            Route::post('login', 'Auth\LoginController@login')->name('admin.login');
        });

        Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

        Route::resource('/property', 'PropertyController');

        Route::resource('/categoryProperty', 'CategoryPropertyController', ['except' => ['update']]);
        Route::post('/categoryProperty/update', 'CategoryPropertyController@update')->name('categoryProperty.update');


        Route::resource('/categories', 'CategoriesController');

        Route::get('/product/getProperty/{categoryId}', 'ProductController@getProperty')->name('product.getProperty');
        Route::get('/product/getBottomCategory/{firstCategoryId}', 'ProductController@getBottomCategory')->name('product.getBottomCategory');
        Route::get('/product/addProperties/{id}', 'ProductController@addProperties')->name('product.addProperties');
        Route::post('/product/saveProperties', 'ProductController@saveProperties')->name('product.saveProperties');
        Route::resource('/product', 'ProductController');

        //Route::resource('/productproperty', 'ProductPropertyController');
    });
});

Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'middleware' => 'guest'], function () {
    Route::get('login', 'LoginController@showLoginForm');
    Route::post('login', 'LoginController@login');
    Route::get('register', 'RegisterController@showRegistrationForm');
    Route::post('register', 'RegisterController@register');
    Route::post('logout', 'LoginController@logout'); // GUEST middleware???
});
Route::get('/home', 'Customer\HomeController@index');
Route::resource('carts', 'Customer\CartController', ['except' => ['destroy']]);
Route::post('carts/destroy', 'Customer\CartController@destroy');

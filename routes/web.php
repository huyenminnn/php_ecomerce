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
Auth::routes();

Route::name('shop.')->group(function() {
    Route::get('/', 'ShopController@index')->name('index');
    Route::get('/product/{slug}', 'ShopController@showProduct')->name('product');
});

Route::prefix('admin')->group(function() {
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.showLoginForm');
    Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

    Route::middleware('admin.auth')->group(function() {
        Route::get('/getProduct','ProductController@getData')->name('products.getData');
        Route::resource('products', 'ProductController');
        Route::resource('users', 'UserController');
        Route::get('/getOrder','OrderController@getData')->name('orders.getData');
        Route::resource('orders', 'OrderController');
        Route::resource('suggest_products', 'SuggestProductController');
    });
});

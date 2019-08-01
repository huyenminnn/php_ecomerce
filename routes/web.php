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
    Route::get('/product/{slug}', 'ShopController@show')->name('product');
    Route::middleware('auth')->group(function() {
        Route::post('/addToCart/{id}', 'CartController@addToCart')->name('addToCart');
        Route::post('/plus/{id}', 'CartController@plus')->name('plus');
        Route::post('/minus/{id}', 'CartController@minus')->name('minus');
        Route::post('/deleteProduct/{id}', 'CartController@deleteProduct')->name('deleteProduct');
        Route::get('/cart', 'CartController@index')->name('cart');
        Route::get('/getCart', 'CartController@getCart');
        Route::post('/getTotal', 'CartController@getTotal')->name('getTotal');
        Route::post('/checkoutCart', 'OrderController@store')->name('checkout');
        Route::resource('suggest_products', 'SuggestProductController');
        Route::get('/history', 'OrderController@getOrder')->name('history');
        Route::get('/getDetailOrder/{id}', 'OrderController@show')->name('getDetailOrder');
        Route::delete('/delete/{id}', 'OrderController@destroy');
    });
});

Route::prefix('admin')->group(function() {
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.showLoginForm');
    Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

    Route::middleware('admin.auth')->group(function() {
        Route::get('/getProduct','ProductController@getData')->name('products.getData');
        Route::resource('products', 'ProductController');
        Route::resource('users', 'UserController');
        Route::get('/getOrder', 'Admin\OrderController@getData')->name('orders.getData');
        Route::resource('orders', 'Admin\OrderController');
        Route::get('/getSuggestProduct', 'Admin\SuggestProductController@getData')->name('suggest.getData');
        Route::resource('suggest_products', 'Admin\SuggestProductController');
    });
});

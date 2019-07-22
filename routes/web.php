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

Route::get('/', function() {
    return view('shopping_views.home');
})->name('home');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.showLoginForm');
    Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');
    Route::get('/product', function() {
        return view('manager_views.product');
    })->name('admin.manager')->middleware('admin.auth');
});



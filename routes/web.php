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

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
});

Route::group(['prefix' => 'cart'], function () {
    Route::get('/', 'CartController@index');
    Route::get('/checkout', 'CartController@checkout');
    Route::get('/{id}', 'CartController@add');
});

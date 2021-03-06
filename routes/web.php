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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::get('/category/{slug}', 'HomeController@showCategory')->name('category');
Route::get('/products/{slug}', 'HomeController@showProduct')->name('product');
Route::get('/search', 'HomeController@search')->name('search');

Route::group(['prefix' => 'cart'], function () {
    Route::get('/', 'CartController@index')->name('cart.index');
    Route::get('/checkout', 'CartController@getCheckout')->name('cart.getCheckout');
    Route::post('/checkout', 'CartController@postCheckout')->name('cart.postCheckout');
    Route::post('/', 'CartController@add')->name('cart.add');
    Route::post('/applyCoupon', 'CartController@applyCoupon')->name('cart.applyCoupon');
    Route::delete('/applyCoupon', 'CartController@removeCoupon')->name('cart.removeCoupon');
    Route::post('/getListDistrict', 'CartController@getListDistrict')->name('cart.getListDistrict');
    Route::post('/getListWard', 'CartController@getListWard')->name('cart.getListWard');
    Route::post('/updateTax', 'CartController@updateTax')->name('cart.updateTax');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::resource('categories', 'CategoryController');
    Route::get('/products/trashed', 'ProductController@trashed')->name('products.trashed');
    Route::put('/products/{id}/restore', 'ProductController@restore')->name('products.restore');
    Route::delete('/products/{id}/forceDelete', 'ProductController@forceDelete')->name('products.forceDelete');
    Route::get('/products/{product}/images', 'ProductController@editImages')->name('products.editImages');
    Route::post('/products/{product}/images', 'ProductController@addImages')->name('products.addImages');
    Route::delete('/products/{product}/images/{image}', 'ProductController@deleteImage')->name('products.deleteImage');
    Route::resource('products', 'ProductController');
    Route::resource('orders', 'OrderController');
    Route::resource('coupons', 'CouponController');
});

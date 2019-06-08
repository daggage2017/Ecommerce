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



Route::get('/', 'MainController@index')->name('main.index');
Route::get('/shops', 'ShopController@index')->name('shops.shop');
Route::get('/shops/{slug}', 'ShopController@show')->name('shops.show');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart/edit/{product}', 'CartController@update')->name('cart.update');
Route::post('/cart/{product}', 'CartController@store')->name('cart.store');

Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/savetolater/{product}', 'CartController@saveToLater')->name('save.later');

Route::delete('/switchSaveToLater/{product}', 'SaveToLaterController@destroy')->name('switch.destroy');
Route::post('/switchSaveToLater/{product}', 'SaveToLaterController@switchMoveToCart')->name('switch.later');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout/store', 'CheckoutController@store')->name('checkout.store');
Route::get('/thank', 'ConfigraionController@index')->name('thank.index');



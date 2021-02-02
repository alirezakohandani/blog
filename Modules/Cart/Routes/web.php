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

Route::group(['prefix' => 'cart', 'namespace' => 'Front', 'as' => 'cart.'], function () {
    
    Route::post('/', 'CartController@store')->name('store');  
    Route::get('/show', 'CartController@show')->name('show');  
    Route::post('/destroy', 'CartController@destroy')->name('destroy');
    Route::post('/clear', 'CartController@clear')->name('clear');
    Route::get('/checkout', 'CartController@checkoutForm')->name('checkout.form');
    Route::post('checkout', 'CartController@checkout')->name('checkout');
    
});
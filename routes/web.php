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

Route::get('/','StoreController@index')->name('store.index');
Route::get('/shipping/{cep}/order/{order}', 'StoreController@shipping')->name('store.shipping');
Route::get('/products/{product}', 'ProductController@show')->name('store.products.show');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/{product}/add', 'CartController@store')->name('cart.store');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
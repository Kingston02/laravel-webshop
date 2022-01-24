<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category', 'CategoryController@index');

Route::get('/products/{productId}', 'ProductsController@index');

Route::get('/products/product/{productId}', 'ProductController@index');

Route::get('/add-to-cart/{productId}', 'CartController@addToCart');

Route::get('/cart', 'CartController@getCart');

Route::get('/filter/{categoryId}', 'ProductsController@filter');

Route::get('/checkout', 'CartController@checkout');

Route::get('/order-submit', 'CartController@orderSubmit')->name('order-submit');

Route::get('/update-cart', 'CartController@updateCart')->name('update-cart');

Route::get('/order-view', 'CartController@viewOrder');

Route::get('/removeCart/{productId}', 'CartController@removeCart');

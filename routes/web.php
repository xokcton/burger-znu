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

Route::get('/', 'MainController@index');
Route::get('/payment', 'MainController@payment');
Route::post('/payment', 'MainController@getComment');
Route::get('/product', 'MainController@product');
Route::post('/product', 'MainController@getCall');
Route::get('/contact', 'MainController@contact');
Route::post('/contact', 'MainController@getQuestion');
Route::get('/product/{slug}', 'MainController@category');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', 'Admin\AdminController@index');

Route::group([
  'prefix'        => 'admin',
  'namespace'     => 'Admin',
  'middleware'    => ['auth', 'admin'],
], function () {
  Route::get('/', 'AdminController@index');
  Route::resource('/category', 'CategoryController');
  Route::resource('/product', 'ProductController');
  Route::resource('/slider', 'SliderController');
  Route::resource('/review', 'ReviewController');
  Route::resource('/question', 'QuestionController');
  Route::resource('/call', 'CallController');
  Route::resource('/order', 'OrderController');
});

// Cart
Route::post('/cart/add', 'CartController@add');
Route::post('/cart/clear', 'CartController@clear');
Route::post('/cart/remove', 'CartController@remove');
Route::get('/checkout', 'CartController@checkout');
Route::post('/confirm', 'CartController@endCheckout');

<?php

use App\Product;
use App\User;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products/create' , 'ProductsController@create');
Route::resource('/products', 'ProductsController')->except(['create', 'destroy', 'edit']);
//Route::post('/products/create','ProductsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

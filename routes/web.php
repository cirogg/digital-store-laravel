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

Route::get('/faq', function () {
    return view('front.faq');
});

Route::get('/products/create' , 'ProductsController@create');
Route::get('/products/{id}/edit', 'ProductsController@edit');
//Ruta para buscador de productos del Navbar
Route::get('/products/search', 'ProductsController@searchByName');
Route::resource('/products', 'ProductsController')->except(['create', 'destroy', 'edit']);
//Route::post('/products/create','ProductsController@store');
Route::delete('/products/{id}', 'ProductsController@destroy');

//Rutas User
Route::resource('/users', 'UsersController')->except(['create', 'destroy', 'edit']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

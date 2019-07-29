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

//Admin-control
Route::get('/admin', function(){
	return view('back.admin');
});

// Route::get('/products/create' , 'ProductsController@create');
// Route::get('/products/{id}/edit', 'ProductsController@edit');

// Si no esta logueado, redirecciona al Login
Route::middleware('auth')->group(function ()
{
	//Products
	Route::get('/products/create', 'ProductsController@create');
	Route::delete('/products/{id}', 'ProductsController@destroy');
	Route::get('/products/{id}/edit', 'ProductsController@edit');
	Route::get('/products', 'ProductsController@index');
	//Cart
	Route::get('/cart/{id}', 'CartsController@show');
	Route::delete('/cart/{id}/{productId}', 'CartsController@destroy');
	Route::post('/cart', 'CartsController@store');
});

//Ruta para buscador de productos del Navbar
Route::get('/products/search', 'ProductsController@searchByName');
Route::resource('/products', 'ProductsController')->except(['create', 'destroy', 'edit']);
//Route::post('/products/create','ProductsController@store');
Route::delete('/products/{id}', 'ProductsController@destroy');

//Rutas User
Route::get('/users/search', 'UsersController@searchByEmail');
Route::resource('/users', 'UsersController')->except(['create', 'destroy', 'edit']);
Route::get('/users/edit/{id}', 'UsersController@edit');
Route::post('/users/{id}', 'UsersController@show');

//Category
Route::get('/categorias', 'CategoriesController@index');
Route::get('/categorias/{id}/edit', 'CategoriesController@edit');
Route::put('/categorias/{id}', 'CategoriesController@update');
Route::delete('/categorias/{id}', 'CategoriesController@destroy');
Route::get('/categorias/create', 'CategoriesController@create');
Route::post('/categorias', 'CategoriesController@store');



Auth::routes();




Route::get('/home', 'HomeController@index')->name('home');

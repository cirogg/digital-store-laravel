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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/faq', function () {
    return view('front.faq');
});



// Route::get('/products/create' , 'ProductsController@create');
// Route::get('/products/{id}/edit', 'ProductsController@edit');
// Si no esta logueado, redirecciona al Login
Route::middleware('auth')->group(function ()
{
	Route::get('/products', 'ProductsController@index');
	//Cart
	Route::get('/cart/{id}', 'CartsController@show');
	Route::delete('/cart/{id}/{productId}', 'CartsController@destroy');
	Route::post('/cart', 'CartsController@store');
});

Route::middleware('admin')->get('/products/create', 'ProductsController@create');

//Ruta para buscador de productos del Navbar
Route::get('/products/search', 'ProductsController@searchByName');
//Filtro productos Dropdown navbar
Route::get('/products/filter/{category_id}/{brand_id?}', 'ProductsController@filter');


Route::resource('/products', 'ProductsController')->except(['create', 'destroy', 'edit']);
//Route::post('/products/create','ProductsController@store');

//Rutas User
Route::middleware('auth')->get('/users/edit/{id}', 'UsersController@edit');
//Route::get('/users/{id}', 'UsersController@show');


Route::middleware('admin')->group(function ()
{
	//Products
	Route::delete('/products/{id}', 'ProductsController@destroy');
	Route::get('/products/{id}/edit', 'ProductsController@edit');
	//USERS
	Route::middleware('auth')->get('/users/search', 'UsersController@searchByEmail');
	Route::middleware('auth')->resource('/users', 'UsersController')->except(['create', 'destroy', 'edit']);
	//Admin-control
	Route::get('/admin', function(){
		return view('back.admin');
	});

	//CATEGORIES --- TODAS ADMIN
	Route::get('/categorias', 'CategoriesController@index');
	Route::get('/categorias/{id}/edit', 'CategoriesController@edit');
	Route::put('/categorias/{id}', 'CategoriesController@update');
	Route::delete('/categorias/{id}', 'CategoriesController@destroy');
	Route::get('/categorias/create', 'CategoriesController@create');
	Route::post('/categorias', 'CategoriesController@store');
});




//Route::get('/home', 'HomeController@index')->name('home');

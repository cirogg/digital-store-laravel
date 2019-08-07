<?php

use App\Product;
use App\User;
use App\Cart;

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

Route::middleware('admin')->get('/users/search', 'UsersController@searchByEmail');

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
Route::get('/users/{id}', 'UsersController@show');



Route::middleware('admin')->group(function ()
{
	//Products
	Route::delete('/products/{id}', 'ProductsController@destroy');
	Route::get('/products/{id}/edit', 'ProductsController@edit');
	//USERS
	
	Route::middleware('auth')->resource('/users', 'UsersController')->except(['create', 'destroy', 'edit']);
	//Admin-control
	Route::get('/admin', function(){
		return view('back.admin');
	});

	//CATEGORIES --- TODAS ADMIN
	Route::get('/categorias', 'CategoriesController@index');
	Route::put('/categorias/{id}', 'CategoriesController@update');
	Route::delete('/categorias/{id}', 'CategoriesController@destroy');
	Route::get('/categorias/create', 'CategoriesController@create');
    Route::post('/categorias', 'CategoriesController@store');
	Route::get('/categorias/{id}/edit', 'CategoriesController@edit');
    Route::get('/brands', 'BrandsController@index');
	Route::get('/brands/edit/{id}', 'BrandsController@edit');
	Route::put('/brands/{id}', 'BrandsController@update');
	Route::delete('/brands/{id}', 'BrandsController@destroy');
	Route::get('/brands/create', 'BrandsController@create');
	Route::post('/brands', 'BrandsController@store');
});


//API
Route::get('/api/products', function () {
	return Product::select('name', 'price', 'image', 'description')->get();
});

Route::get('/api/products/{id}', function ($id) {
	return Product::select('name', 'price', 'image', 'description')->where('id',$id)->get();
});

Route::get('api/users', function () {
	return User::select('name', 'surname', 'nickname', 'email', 'avatar')->get();
});

//Devuelve los CARTS del user ID que le pase
Route::get('api/carts/', function () {

    $cart = Cart::select('id', 'is_paid', 'user_id', 'product_id')->get();
    $cartFilter = $cart->where('user_id', Auth::user()->id);
    return $cartFilter;

});




//Route::get('/home', 'HomeController@index')->name('home');

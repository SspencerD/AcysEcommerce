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

use App\Http\Controllers\HomeController;
Route::get('principio','InicioController@inicio')->name('principio');
Route::get('inicio', 'WelcomeController@index')->name('inicio');
Route::get('search','SearchController@show')->name('search');
Route::get('/products/json','SearchController@data');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');





//carrito de compras
Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');
//orden
Route::post('order.update', 'CartController@update')
    ->name('order.update')->middleware('can:roles:orden.update');

Route::middleware(['auth'])->group(function () {


    //pago
    Route::get('/payments', 'PaymentController@index')->name('payments');
    Route::post('/payments/pay','PaymentController@pay')->name('pay');
    Route::get('/payments/approval', 'PaymentController@approval')->name('approval');
    Route::get('/payments/cancelled', 'PaymentController@cancelled')->name('cancelled');
    //perfil
    Route::get('perfil', 'HomeController@perfil')->name('perfil');

    //otros
    Route::get('contacto','WelcomeController@contacto')->name('contacto');
    Route::get('nosotros', 'WelcomeController@nosotros')->name('nosotros');

    //dashboard
    Route::get('dashboard', 'DashboardController@dashboard')
        ->name('admin.dashboard')->middleware('can:roles:dashboard.dashboard');
    //roles
    Route::resource('roles', 'RoleController');
    //Imagenes de producto
    Route::get('products/{product}/images', 'ImageController@index')
        ->name('products.images')->middleware('can:roles:products.images');

    Route::post('products/{id}/images', 'ImageController@store')
        ->name('products.images.store')->middleware('can:roles:products.images.store');

    Route::delete('products/{product}/images/', 'ImageController@destroy')
        ->name('products.images.destroy')->middleware('can:roles:products.images.destroy');

    Route::get('products/{product}/images/select/{images}', 'ImageController@select')
        ->name('products.images.select')->middleware('can:roles:products.images.select');
    //Products
    Route::resource('products', 'ProductController');
    Route::get('/products/{id}','ProductController@show');
    //Categories
    Route::resource('categories', 'CategoryController');
    //SubCategories
    Route::resource('subcategories', 'SubcategoriesController');
    //Users
    Route::resource('users', 'UserController');
});

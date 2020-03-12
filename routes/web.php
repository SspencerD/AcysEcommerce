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

Route::resource('welcome', 'WelcomeController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::post('/cart', 'CartDetailController@store');

Route::middleware(['auth'])->group(function () {

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
    //Categories
    Route::resource('categories', 'CategoryController');
    //Users
    Route::resource('users', 'UserController');
});
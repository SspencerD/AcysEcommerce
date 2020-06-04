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
use App\Http\Controllers\ProductController;


Route::get('/','Homecontroller@index')->name('comienzo');
Route::get('principio','InicioController@inicio')->name('principio');
Route::get('inicio', 'WelcomeController@index')->name('inicio');
Route::get('search','SearchController@show')->name('search');
Route::get('/products/json','SearchController@data');
//otros
Route::get('contacto', 'WelcomeController@contacto')->name('contacto');
Route::get('nosotros', 'WelcomeController@nosotros')->name('nosotros');
Route::get('noticias','WelcomeController@noticias')->name('noticias');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//Callbacks
Route::post('/webpay/callback', 'PaymentController@callbackWebpay')->name('callback.webpay');


//carrito de compras
Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');
//orden
Route::post('order.update', 'CartController@update')->name('order.update');


Route::middleware(['auth'])->group(function () {

    Route::get('orders/{id}', 'CartController@detalle')->name('orders');
    //pago
    Route::get('/payments', 'PaymentController@index')->name('payments');
    Route::post('/payments/pay','PaymentController@pay')->name('pay');
    Route::get('/payments/approval', 'PaymentController@approval')->name('approval');
    Route::get('/payments/cancelled', 'PaymentController@cancelled')->name('cancelled');
    //perfil
    Route::get('perfil', 'HomeController@perfil')->name('perfil');

    //edición de usuarioo
    Route::get('/edits/edit-user/{id}','HomeController@edit')->name('edit-user');
    Route::post('/edits/user', 'HomeController@store')->name('edits.store');

    //dashboard
    Route::get('dashboard', 'DashboardController@dashboard')->name('admin.dashboard');

    //Imagenes de producto
    Route::get('products/{product}/images', 'ImageController@index')
        ->name('products.images');
    Route::post('products/{id}/images', 'ImageController@store')
        ->name('products.images.store');
    Route::delete('products/{product}/images/', 'ImageController@destroy')
        ->name('products.images.destroy');
    Route::get('products/{product}/images/select/{images}', 'ImageController@select')
        ->name('products.images.select');
    //Conjunto rutas Products
    Route::get('products.index','ProductController@index')->name('products.index');
    Route::get('products/create','ProductController@create')->name('products.create');
    Route::post('/products','ProductController@store')->name('products.store');
    Route::get('products/{product}/edit','ProductController@edit')->name('products.edit');
    Route::post('products/{product}/edit','ProductController@update')->name('products.update');
    Route::get('products/{product}/','ProductController@show')->name('products.show');
    Route::post('products/{product}','ProductController@destroy')->name('products.destroy');
    
    Route::post('import-list-excel','ProductController@importExcel')->name('products.imports.excel');

    // Conjunto rutas Categories

    Route::get('categories.index','CategoryController@index')->name('categories.index');
    Route::get('categories.create','CategoryController@create')->name('categories.create');
    Route::get('categories/{category}/edit','CategoryController@edit')->name('categories.edit');
    Route::post('/categories','CategoryController@store')->name('categories.store');
    Route::post('categories/{category}/edit','CategoryController@update')->name('categories.update');

    Route::get('categories/{category}/','CategoryController@show')->name('categories.show');

    Route::delete('categories/{category}','CategoryController@destroy')->name('categories.destroy');

    //Users
    Route::get('users.index','UserController@index')->name('users.index');
    Route::get('users/{user}/edit','UserController@edit')->name('users.edit');
    Route::post('users/{user}/edit','UserController@update')->name('users.update');
    Route::get('users/{user}/','UserController@show')->name('users.show');
    Route::delete('users/{user}','UserController@destroy')->name('users.destroy');
    //Noticias
    Route::get('noticies/index','NoticeController@index')->name('news');
    Route::get('noticies/create','NoticeController@create')->name('news.create');
    Route::post('/noticies','NoticeController@store')->name('news.store');
    Route::get('/noticies/{notice}/edit','NoticeController@edit')->name('news.edit');
    Route::post('/noticies/{notice}/edit','NoticeController@update')->name('news.update');
    Route::post('/noticies/{notice}','NoticeController@destroy')->name('news.destroy');
    Route::get('noticies/{notice}/','NoticeController@show')->name('news.show');

    //roles
    Route::get('roles.index','RoleController@index')->name('roles');
    Route::get('/roles/create','RoleController@create')->name('roles.create');
    Route::post('/roles','RoleController@store')->name('roles.store');
    Route::get('/roles/{role}/edit','RoleController@edit')->name('roles.edit');
    Route::post('/roles/{role}/edit','RoleController@update')->name('roles.update');
    Route::delete('/roles/{role}','RoleController@destroy')->name('roles.destroy');
    Route::get('/roles/{role}/','RoleController@show')->name('roles.show');
    // Slider Ferreteria
    
    Route::get('slideferre.index','SlideferController@index')->name('slideferreteria');
    Route::get('slideferreteria.create', 'SlideferController@create')->name('slideferreteria.create');
    Route::post('/sliderferreteria','SlideferController@store')->name('sildeferreteria.store');
    Route::get('/slideferreteria/{slidefer}/edit','SlideferController@edit')->name('slideferreteria.edit');
    Route::post('/slideferreteria/{slidefer}/edit', 'SlideferController@update')->name('slideferreteria.update');
    Route::delete('/slideferreteria/{slidefer}', 'SlideferController@destroy')->name('slideferreteria.destroy');
    Route::get('/slideferreteria/{slidefer}/', 'SlideferController@show')->name('slideferreteria.show');

    //Slider Electronica
    Route::get('slideferelect', 'SlideelecController@index')->name('slideferelect');
    Route::get('slideferelect.create', 'SlideelecController@create')->name('slideferelect.create');
    Route::post('/slideferelect', 'SlideelecController@store')->name('slideferelect.store');
    Route::get('/slideferelect/{slideelect}/edit', 'SlideelecController@edit')->name('slideferelect.edit');
    Route::post('/slideferelect/{slideelect}/edit', 'SlideelecController@update')->name('slideferelect.update');
    Route::delete('/slideferelect/{slideelect}', 'SlideelecController@destroy')->name('slideferelect.destroy');
    Route::get('/slideferelect/{slideelect}/', 'SlideelecController@show')->name('slideferelect.show');

    //historial de compras
    Route::get('/historicos/index','DashboardController@historicos')->name('historicos');
    
});

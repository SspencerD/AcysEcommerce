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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::middleware(['auth'])->group(function () {

    //roles

    Route::post('roles/store', 'RoleController@store')
        ->name('roles.store')
        ->middleware('can:roles:roles.create');

    Route::get('roles', 'RoleController@index')
        ->name('roles.index')
        ->middleware('can:roles:roles.index');

    Route::get('roles/create', 'RoleController@create')
        ->name('roles.create')
        ->middleware('can:roles:roles.create');

    Route::put('roles/{role}', 'RoleController@update')
        ->name('roles.update')
        ->middleware('can:roles:roles.edit');

    Route::get('roles/{role}', 'RoleController@show')
        ->name('roles.show')
        ->middleware('can:roles:roles.show');

    Route::delete('roles/{role}', 'RoleController@destroy')
        ->name('roles.destroy')
        ->middleware('can:roles:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')
        ->name('roles.edit')
        ->middleware('can:roles:roles.edit');

    //Products
    Route::post('products/store', 'ProductController@store')
        ->name('products.store')
        ->middleware('can:roles:products.create');

    Route::get('products', 'ProductController@index')
        ->name('products.index')
        ->middleware('can:roles:products.index');

    Route::get('products/create', 'ProductController@create')
        ->name('products.create')
        ->middleware('can:roles:products.create');

    Route::put('products/{role}', 'ProductController@update')
        ->name('products.update')
        ->middleware('can:roles:products.edit');

    Route::get('products/{role}', 'ProductController@show')
        ->name('products.show')
        ->middleware('can:roles:products.show');

    Route::delete('products/{role}', 'ProductController@destroy')
        ->name('products.destroy')
        ->middleware('can:roles:products.destroy');

    Route::get('products/{role}/edit', 'ProductController@edit')
        ->name('products.edit')
        ->middleware('can:roles:roles.edit');


    //Categories

    Route::post('categories/store', 'CategoryController@store')
        ->name('categories.store')
        ->middleware('can:roles:categories.create');

    Route::get('categories', 'CategoryController@index')
        ->name('categories.index')
        ->middleware('can:roles:categories.index');

    Route::get('categories/create', 'CategoryController@create')
        ->name('categories.create')
        ->middleware('can:roles:categories.create');

    Route::put('categories/{role}', 'CategoryController@update')
        ->name('categories.update')
        ->middleware('can:roles:categories.edit');

    Route::get('categories/{role}', 'CategoryController@show')
        ->name('categories.show')
        ->middleware('can:roles:categories.show');

    Route::delete('categories/{role}', 'CategoryController@destroy')
        ->name('categories.destroy')
        ->middleware('can:roles:categories.destroy');

    Route::get('categories/{role}/edit', 'CategoryController@edit')
        ->name('categories.edit')
        ->middleware('can:roles:roles.edit');


    //Users

    Route::get('users', 'UserController@index')
        ->name('users.index')
        ->middleware('has.roles:users.index');

    Route::put('users/{role}', 'UserController@update')
        ->name('users.update')
        ->middleware('has.roles:users.edit');

    Route::get('users/{role}', 'UserController@show')
        ->name('users.show')
        ->middleware('has.roles:users.show');

    Route::delete('users/{role}', 'UserController@destroy')
        ->name('users.destroy')
        ->middleware('has.roles:users.destroy');

    Route::get('users/{role}/edit', 'UserController@edit')
        ->name('users.edit')
        ->middleware('has.roles:roles.edit');
});
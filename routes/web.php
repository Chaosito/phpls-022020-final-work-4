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

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

// Future: user-profile page (Now go home)
Route::get('/home', 'HomeController@index')->name('home');

// hz
Route::get('/products', 'ProductCategoryController@index')->name('products');

// in progress
Route::get('/products/category/{id}', 'ProductCategoryController@index')->name('products.category');

// hz
Route::get('/products/category/all', 'ProductController@ListByCategory')->name('products.category.all');


//Route::get('/test', function(){
//    return 'blabla';
//});

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products', 'ProductController@index')->name('products');
Route::get('/products/category/{id}', 'ProductController@listbycategory')->name('products.category');
Route::get('/products/category/all', 'ProductController@ListByCategory')->name('products.category.all');

//Route::get('/test', function(){
//    return 'blabla';
//});

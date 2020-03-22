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

// Просмотр товаров по определенной категории
// Complete!
Route::get('/products/category/{id}', 'ProductCategoryController@index')->name('products.category');

// hz
Route::get('/category/list', 'ProductController@listByCategory')->name('products.category.all');

// О нас, о магазине
// Complete! (static-page)
Route::get('/about', 'HomeController@about')->name('about');

// Список новостей
// Complete! (News list)
Route::get('/news', 'NewsController@list')->name('news');

// Конкретная новость
//
Route::get('/news/{id}', 'NewsController@item')->name('news.item');

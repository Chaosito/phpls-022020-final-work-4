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

// To-Do: Возможно в будущем сделать профиль юзера
Route::get('/home', 'HomeController@index')->name('home');

// Конкретный продукт
Route::get('/products/{id}', 'ProductController@item')->name('products.item');

// Просмотр товаров по определенной категории
Route::get('/products/category/{id}', 'ProductCategoryController@index')->name('products.category');

// To-Do: Список всех категорий
Route::get('/category/list', 'ProductCategoryController@listAll')->name('products.category.all');

// About
Route::get('/about', 'HomeController@about')->name('about');

// Список новостей
Route::get('/news', 'NewsController@list')->name('news');

// Конкретная новость
Route::get('/news/{id}', 'NewsController@item')->name('news.item');

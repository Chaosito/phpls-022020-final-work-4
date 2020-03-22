<?php

use Illuminate\Support\Facades\Route;

/*
| Web Routes
*/

/*
 * To-Do:
 * Посмотрите наши товары (футер)
 * +++Мои заказы
 * Оформление заказа
 * Отправка на почту
 * Профиль?
 * Редактирование настроек, категорий, продуктов, новостей
 * Поиск
 * Формы регистрации и авторизации к нормальному виду
 *
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

// Мои заказы
Route::get('/myorders', 'OrdersController@myOrders')->name('orders.my');

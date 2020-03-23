<?php

use Illuminate\Support\Facades\Route;

/*
| Web Routes
*/

/*
 * To-Do:
 *  Посмотрите наши товары (футер)
 *  +++Мои заказы
 *  +++Оформление заказа (JS-Order)
 *  Отправка на почту
 *  +++"Больше категорий"
 *  Редактирование настроек, категорий, продуктов, новостей
 *  Поиск
 *  Формы регистрации и авторизации к нормальному виду
 *  Профиль?
 *  Форму редактирования категорий
 *  Ошибка удаления категории
 */

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

// To-Do: Возможно в будущем сделать профиль юзера
Route::get('/home', 'HomeController@index')->name('home');

// Конкретный продукт
Route::get('/products/{id}', 'ProductController@item')->name('products.item');

// Просмотр товаров по определенной категории
Route::get('/category/{id}', 'ProductCategoryController@index')->name('products.category');

// Редактирование категории
Route::get('/category/{id}/edit', 'ProductCategoryController@edit')->name('products.category.edit')->middleware('auth');
Route::post('/category/{id}/edit', 'ProductCategoryController@save')->name('products.category.edit.save')->middleware('auth');

// Создание категории
Route::get('/category/add', 'ProductCategoryController@add')->name('products.category.add')->middleware('auth');

// Удаление категории
Route::get('/category/{id}/delete', 'ProductCategoryController@delete')->name('products.category.delete');

// To-Do: Список всех категорий
Route::get('products/category/list', 'ProductCategoryController@listAll')->name('products.category.all');

// About
Route::get('/about', 'HomeController@about')->name('about');

// Список новостей
Route::get('/news', 'NewsController@list')->name('news');

// Конкретная новость
Route::get('/news/{id}', 'NewsController@item')->name('news.item');

// Мои заказы
Route::get('/myorders', 'OrdersController@myOrders')->name('orders.my');

// Popup-window order
Route::get('/buy-window/{id}', 'OrdersController@buyWindow')->name('orders.buy-window');

// Try order
Route::post('/product/buy/{id}', 'OrdersController@buy')->name('product.buy');

// To-Do: Search
Route::get('/search', 'HomeController@search')->name('search');

// To-Do: Settings (to-do admins only via middleware?)
Route::get('/admin/settings', 'SettingsController@index')->name('site.settings')->middleware('auth');
Route::post('/admin/settings', 'SettingsController@save')->name('site.settings.save')->middleware('auth');

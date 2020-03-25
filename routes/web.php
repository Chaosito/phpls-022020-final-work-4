<?php

use Illuminate\Support\Facades\Route;

/*
| Web Routes
*/

/*
 * To-Do:
 *  ++++кастом реквесты для общих валидаций
 *  +++Форма вид добавления/редактирования категорий, новостей
 *  resize crop img on news & products
 *  +++Поиск
 *  +++Отправка на почту
 *  +++middleware
 *  +++роуты причесать
 * FullTests with zero-config
 *
 */

Auth::routes();

// Главная страница
Route::redirect('/home','/');
Route::get('/', 'HomeController@index')->name('index');

// Категории
Route::group(['prefix' => 'category'], function() {
    Route::post('add', 'ProductCategoryController@append')->middleware('auth', 'admins.only');
    Route::post('{id}/edit', 'ProductCategoryController@save')->middleware('auth', 'admins.only');

    Route::name( 'category.')->group(function() {
        Route::get('add', 'ProductCategoryController@add')->name('add')->middleware('auth', 'admins.only');
        Route::get('{id}/edit', 'ProductCategoryController@edit')->name('edit')->middleware('auth', 'admins.only');
        Route::get('{id}/delete', 'ProductCategoryController@delete')->name('delete')->middleware('auth', 'admins.only');
        Route::get('list', 'ProductCategoryController@listAll')->name('all');
        Route::get('{id}', 'ProductCategoryController@index')->name('in');
    });
});

// Проодукты
Route::group(['prefix' => 'product'], function() {
    Route::post('add', 'ProductController@append')->middleware('auth', 'admins.only');
    Route::post('{id}/edit', 'ProductController@save')->middleware('auth', 'admins.only');

    Route::name( 'product.')->group(function() {
        Route::get('add', 'ProductController@add')->name('add')->middleware('auth', 'admins.only');
        Route::get('{id}/edit', 'ProductController@edit')->name('edit')->middleware('auth', 'admins.only');
        Route::get('{id}/delete', 'ProductController@delete')->name('delete')->middleware('auth', 'admins.only');
        Route::get('{id}', 'ProductController@item')->name('item');
        Route::post('buy/{id}', 'OrdersController@buy')->name('buy');
    });
});

// Новости
Route::group(['prefix' => 'news'], function() {
    Route::post('add', 'NewsController@append')->middleware('auth', 'admins.only');
    Route::post('{id}/edit', 'NewsController@save')->middleware('auth', 'admins.only');
    Route::get('/', 'NewsController@list')->name('news');

    Route::name( 'news.')->group(function() {
        Route::get('add', 'NewsController@add')->name('add')->middleware('auth', 'admins.only');
        Route::get('{id}/edit', 'NewsController@edit')->name('edit')->middleware('auth', 'admins.only');
        Route::get('{id}/delete', 'NewsController@delete')->name('delete')->middleware('auth', 'admins.only');
        Route::get('{id}', 'NewsController@item')->name('item');
    });
});

// Заказы
Route::name( 'orders.')->group(function() {
    Route::get('/myorders', 'OrdersController@myOrders')->name('my')->middleware('auth');
    Route::get('/buy-window/{id}', 'OrdersController@buyWindow')->name('buy-window');
});

// О нас
Route::get('/about', 'HomeController@about')->name('about');

// Поиск
Route::get('/search', 'HomeController@search')->name('search');

// Настройки
Route::group(['prefix' => 'admin/settings'], function() {
    Route::get('/', 'SettingsController@index')->name('site.settings')->middleware('auth', 'admins.only');
    Route::post('/', 'SettingsController@save')->middleware('auth', 'admins.only');
});


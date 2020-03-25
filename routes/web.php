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
 * роуты причесать
 * FullTests with zero-config
 *
 */

Auth::routes();

// Главная страница
Route::redirect('/home','/');
Route::get('/', 'HomeController@index')->name('index');

// To-Do: Возможно в будущем сделать профиль юзера
//Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'category'], function(){
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





// Конкретный продукт
Route::get('/products/{id}', 'ProductController@item')->name('products.item');

// About
Route::get('/about', 'HomeController@about')->name('about');

// Список новостей
Route::get('/news', 'NewsController@list')->name('news');
Route::get('/news/add', 'NewsController@add')->name('news.add')->middleware('auth', 'admins.only');
Route::post('/news/add', 'NewsController@append')->middleware('auth', 'admins.only');

    Route::get('/news/{id}/edit', 'NewsController@edit')->name('news.edit')->middleware('auth', 'admins.only');
    Route::post('/news/{id}/edit', 'NewsController@save')->middleware('auth', 'admins.only');
    Route::get('/news/{id}/delete', 'NewsController@delete')->name('news.delete')->middleware('auth', 'admins.only');

// Конкретная новость
Route::get('/news/{id}', 'NewsController@item')->name('news.item');

// Мои заказы
Route::get('/myorders', 'OrdersController@myOrders')->name('orders.my')->middleware('auth');

// Popup-window order
Route::get('/buy-window/{id}', 'OrdersController@buyWindow')->name('orders.buy-window');

// Try order
Route::post('/product/buy/{id}', 'OrdersController@buy')->name('product.buy');

Route::get('/product/add', 'ProductController@add')->name('product.add')->middleware('auth', 'admins.only');
Route::post('/product/add', 'ProductController@append')->middleware('auth', 'admins.only');

Route::get('/product/{id}/edit', 'ProductController@edit')->name('product.edit')->middleware('auth', 'admins.only');
Route::post('/product/{id}/edit', 'ProductController@save')->middleware('auth', 'admins.only');
Route::get('/product/{id}/delete', 'ProductController@delete')->name('product.delete')->middleware('auth', 'admins.only');

// To-Do: Search
Route::get('/search', 'HomeController@search')->name('search');

// To-Do: Settings (to-do admins only via middleware?)
Route::get('/admin/settings', 'SettingsController@index')->name('site.settings')->middleware('auth', 'admins.only');
Route::post('/admin/settings', 'SettingsController@save')->name('site.settings.save')->middleware('auth', 'admins.only');

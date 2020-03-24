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

Auth::routes();

// Главная страница
Route::get('/', 'HomeController@index')->name('index');

// To-Do: Возможно в будущем сделать профиль юзера
Route::get('/home', 'HomeController@index')->name('home');



// Создание категории

Route::group(['prefix' => 'category'], function(){



// Редактирование категории

// Удаление категории

// To-Do: Список всех категорий

// Просмотр товаров по определенной категории
//    Route::get('{id}', 'ProductCategoryController@index')->where('id', '[0-9]+')->name('products.category');

});

Route::group(['prefix' => 'category'], function(){
    Route::post('add', 'ProductCategoryController@append')->middleware('auth');
    Route::post('{id}/edit', 'ProductCategoryController@save')->middleware('auth');

    Route::name( 'category.')->group(function() {
        Route::get('add', 'ProductCategoryController@add')->name('add')->middleware('auth');
        Route::get('{id}/edit', 'ProductCategoryController@edit')->name('edit')->middleware('auth');
        Route::get('{id}/delete', 'ProductCategoryController@delete')->name('delete')->middleware('auth');
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

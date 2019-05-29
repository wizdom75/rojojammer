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

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'ProductsController@show')->name('product');
Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/browse/{slug}', 'CategoriesController@show')->name('category');
Route::get('/contact', 'MessagesController@create')->name('message');
Route::get('/results', 'ProductsController@search')->name('search');
Route::post('/contact', 'MessagesController@store')->name('save_message');
Route::post('/create-quote', 'QuoteController@store')->name('save_quote');
Route::get('/page/{slug}', 'PagesController@show')->name('page');


Route::get('/admin', 'Admin\DashboardController@index')->name('dashboard')->middleware('admin');
Route::resource('/admin/products', 'Admin\ProductsController')->middleware('admin');
Route::resource('/admin/categories', 'Admin\CategoriesController')->middleware('admin');
Route::resource('/admin/messages', 'Admin\MessagesController')->middleware('admin');
Route::resource('/admin/quotes', 'Admin\QuoteController')->middleware('admin');
Route::resource('/admin/pages', 'Admin\PagesController')->middleware('admin');
Route::resource('/admin/users', 'Admin\UsersController')->middleware('admin');
Route::resource('/admin/banners', 'Admin\BannersController')->middleware('admin');
Route::resource('/admin/videos', 'Admin\VideosController')->middleware('admin');
Route::resource('/admin/settings', 'Admin\SettingsController')->middleware('admin');

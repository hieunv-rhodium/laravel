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

//Route::get('/', function () {
//    return view('welcome');
//});

// Auth route
Auth::routes();

// home page route
Route::get('/','PagesController@index');

Route::get('terms-of-service', 'PagesController@terms');

// test route -- throttle chan so lan truy cap
Route::get('/test','TestController@index')->middleware('auth', 'throttle:5');

//Admin route

Route::get('/admin','AdminController@index')->name('admin');

// widget route

Route::get('/widget/create', 'WidgetController@create')->name('widget.create');

Route::get('/widget/{widget}-{slug?}','WidgetController@show')->name('widget.show');

Route::resource('widget','WidgetController', ['except' => ['show','create']]);


// category route

Route::get('/categories/create', 'CategoryController@create')->name('categories.create');

Route::get('/categories/{categories}-{slug?}', 'CategoryController@show')->name('categories.show');

Route::resource('categories','CategoryController', ['except' => ['show','create']]);


// product route

Route::resource('product','ProductController');
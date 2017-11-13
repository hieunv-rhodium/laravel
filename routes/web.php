<?php
use App\Events\MessagePosted;
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

// Admin route

Route::get('/admin', 'AdminController@index')->name('admin');

// Authentication routes

Route::get('login', 'Auth\AuthController@showLoginForm')->name('login');
Route::post('login', 'Auth\AuthController@login');
Route::post('logout', 'Auth\AuthController@logout')->name('logout');


// Chat routes
Route::get('/chat-messages', 'ChatController@getMessages')->middleware('auth');

Route::post('/chat-messages', 'ChatController@postMessage')->middleware('auth');

Route::get('/chat', 'ChatController@index')->middleware('auth');


// Username route
Route::get('/username', 'UsernameController@show')->middleware('auth');

// home page route

Route::get('/', 'PagesController@index')->name('home');


// Password routes


// Password Reset Routes...

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Privacy route

Route::get('privacy', 'PagesController@privacy');

// Registration routes

Route::get('register', 'Auth\AuthController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\AuthController@register');

// Socialite routes

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');

Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

// Terms route

Route::get('terms-of-service', 'PagesController@terms');


// test route

Route::get('test', 'TestController@index')->middleware(['auth', 'throttle:15']);


// Widget route

Route::get('widget/create',  'WidgetController@create')->name('widget.create');

Route::get('widget/{id}-{slug?}', 'WidgetController@show')->name('widget.show');

Route::resource('widget', 'WidgetController', ['except' => ['show', 'create']]);

// Categories route

Route::resource('categories','CategoryController');


// Subcategory route
Route::resource('subcategory' , 'SubcategoryController');


// Product route

Route::resource('product','ProductController');

//Profile route

Route::get('show-profile','ProfileController@showProfileToUser')->name('show-profile');

Route::get('determine-profile-route','ProfileController@determineProfileRoute')->name('determine-profile-route');

Route::resource('profile', 'ProfileController');

// User route

Route::resource('user','UserController');

// Setting route

Route::get('settings' , 'SettingsController@edit');

Route::post('settings', 'SettingsController@update')->name('user-update');

Route::resource('marketing-image', 'MarketingImageController');


// API Widget

Route::get('api/widget-data', 'ApiController@widgetData');


// Api Images

Route::get('api/marketing-image-data' , 'ApiController@marketingImageData');


// Api User

Route::get('api/user-data' , 'ApiController@userData');


// Api Category
Route::get('api/category-data' , 'ApiController@categoryData');

// Api subCategory
Route::get('api/subcategory-data' , 'ApiController@subcategoryData');


// Lesson
Route::get('lesson/create' , 'LessonController@create')->name('lesson.create');

Route::get('lesson/{lesson}-{slug?}' , 'LessonController@show')->name('lesson.show');

Route::resource('lesson' , 'LessonController', ['except' => ['show','create']]);


// Api lesson
Route::get('api/lesson-data' , 'ApiController@lessonData');


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

Route::get('/post/{slug}', 'SlugController@index')->name('slug');
Route::get('/categories', 'CategoryController@index')->name('categories.list');
Route::post('/categories/add', 'CategoryController@store')->name('categories.store');
Route::post('/categories/delete/{id}', 'CategoryController@destroy')->name('categories.delete');
Route::get('/home', 'PostController@index')->name('posts.home');
Route::get('/about', 'PageController@getAbout')->name('about');
Route::post('/contact', 'PageController@postContact');
Route::get('/contact', 'PageController@getContact')->name('contact');
Route::get('/list', 'PostController@userPostList')->name('posts.list');
Route::get('/', 'PostController@index')->name('home');
Route::resource('posts', 'PostController');
Route::resource('tags', 'TagController' , ['except' => 'create']);
Auth::routes();


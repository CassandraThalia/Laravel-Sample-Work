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

Route::get('/', 'PostController@index');
Route::get('/theme', 'PostController@theme');

Auth::routes();

Route::get('/home', 'PostController@index');
Route::get('/create', 'PostController@create');
Route::post('/home', 'PostController@store');

Route::get('/{post}/edit', 'PostController@edit');
Route::patch('/{post}', 'PostController@update');
Route::delete('/{post}', 'PostController@destroy');

Route::get('/admin/users', 'UserController@index');
Route::get('/admin/users/create', 'UserController@create');
Route::post('/admin/users', 'UserController@store');
Route::get('/admin/users/{user}', 'UserController@show');
Route::get('/admin/users/{user}/edit', 'UserController@edit');
Route::patch('/admin/users/{user}', 'UserController@update');
Route::delete('/admin/users/{user}', 'UserController@destroy');

Route::get('/admin/themes', 'ThemeController@index');
Route::get('/admin/themes/create', 'ThemeController@create');
Route::post('/admin/themes', 'ThemeController@store');
Route::get('/admin/themes/{theme}', 'ThemeController@show');
Route::get('/admin/themes/{theme}/edit', 'ThemeController@edit');
Route::patch('/admin/themes/{theme}', 'ThemeController@update');
Route::delete('/admin/themes/{theme}', 'ThemeController@destroy');



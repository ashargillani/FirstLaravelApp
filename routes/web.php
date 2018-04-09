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

Route::get('/', 'UsersController@index')->name('home');
Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts/{post}/comments', 'CommentsController@store');

//***Flow of resource routing***
//Route::get('/users', 'UsersController@index');
//Route::get('/users/create', 'UsersController@create');
//Route::post('/users', 'UsersController@store');
//Route::get('/users/{user}', 'UsersController@show');
//Route::patch('/users/{user}', 'UsersController@update');
//Route::get('/users/{user}/edit', 'UsersController@edit');
//Route::get('/users/{user}/edit', 'UsersController@edit');
//Route::delete('/users/{user}', 'UsersController@destroy');

Auth::routes();
Route::resource('users', 'UsersController');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store')->name('loginSession');
Route::get('/register', 'RegistrationController@create')->name('register');
Route::post('/register', 'RegistrationController@store')->name('reg_user');
Route::get('/logout', 'SessionsController@destroy')->name('logout');

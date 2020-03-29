<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PostController@index')->name('posts')->middleware('auth');

Route::get('/create', 'PostController@create')->name('create');


Route::post('/create.post', 'PostController@store')->name('create.post');

Route::delete('/delete/{id}', 'PostController@delete')->name('delete');
Route::get('/edit/{id}', 'PostController@edit')->name('edit');
Route::post('/update/{id}', 'PostController@update')->name('update');
Route::get('/post/{id}', 'PostController@show')->name('show');
// Route::post('books/delete/{id}','AdminControl@destroy')->name('books.delete');
Route::get('logout', 'Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('/', 'TodoController@index')->name('todos');
Route::post('/create/todo', 'TodoController@store')->name('todos.store');

Route::get('/edit/todo/{id}', 'TodoController@edit')->name('todo.edit');
Route::post('/update/todo/{id}', 'TodoController@update')->name('todo.update');

Route::get('/delete/todo/{id}', 'TodoController@destroy')->name('todo.delete');

Route::get('/completed/todo/{id}', 'TodoController@completed')->name('todo.completed');
Route::get('/uncompleted/todo/{id}', 'TodoController@uncompleted')->name('todo.uncompleted');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

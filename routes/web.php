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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todo', 'Todo@index')->name('todoIndex');
Route::get('/todo/new', 'Todo@new_form')->name('todoNewForm');
Route::get('/todo/finished', 'todo@finished')->name('todoFinished');
Route::post('/todo', 'Todo@save')->name('todoNew');
Route::get('/todo/{id}', 'Todo@detail')->name('todoDetail');
Route::get('/todo/delete/{id}', 'todo@delete')->name('todoDelete');
Route::get('/todo/edit/{id}', 'todo@edit')->name('todoEditForm');
Route::post('/todo/edit/{id}', 'todo@update')->name('todoUpdate');
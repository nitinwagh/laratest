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

Route::get('/', 'Web\StateController@index');
Route::post('add-city', 'Web\StateController@addCity')->name('add.city');
Route::get('edit-city/{id}', 'Web\StateController@addCity')->name('edit.city');
Route::get('delete-city/{id}', 'Web\StateController@deleteCity')->name('delete.city');

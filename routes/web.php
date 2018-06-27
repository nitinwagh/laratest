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

Route::get('/', 'Web\StateController@index')->name('home');
Route::post('add-city', 'Web\StateController@addCity')->name('add.city');
Route::post('edit-city', 'Web\StateController@editCity')->name('edit.city');
Route::get('delete-city/{id}', 'Web\StateController@deleteCity')->name('delete.city');

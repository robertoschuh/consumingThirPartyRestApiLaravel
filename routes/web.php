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


Route::get('/', 'CountryController@index')->name('country.index');
Route::get('/country/create', 'CountryController@create')->name('country.create');

Route::post('/country', 'CountryController@store')->name('country.store');

// We could add here the other VERBS / ACTIONS PUT, DELETE, UPDATE, PATCH
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
Route::auth();

Route::get('/', 'HomeController@index')->name('dashboard');
Route::get('/premise', 'PremiseController@index')->name('premise.index');
Route::get('/premise/import/premise', 'PremiseController@excel')->name('premise.excel');
Route::post('/premise/import/premise', 'PremiseController@upload')->name('premise.upload');



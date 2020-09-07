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
Route::get('/premise/import', 'PremiseController@excel')->name('premise.excel');
Route::post('/premise/import', 'PremiseController@upload')->name('premise.upload');
Route::get('/premise/data', 'PremiseController@data')->name('premise.data');
Route::get('/premise/create', 'PremiseController@create')->name('premise.create');
Route::post('/premise/store', 'PremiseController@store')->name('premise.store');
Route::post('/premise/getPremise/','PremiseController@getPremise')->name('premise.getPremise');


Route::get('/application', 'FcApplicationController@index')->name('application.index');
Route::get('/application/create', 'FcApplicationController@create')->name('application.create');
Route::post('/application/store', 'FcApplicationController@store')->name('application.store');
Route::get('/application/data', 'FcApplicationController@data')->name('application.data');
Route::post('/application/approved/{applicationId}', 'FcApplicationController@approved')->name('application.approved');
Route::get('/application/approving/{applicationId}', 'FcApplicationController@approving')->name('application.approving');

Route::get('/inspection/create/{applicationId}', 'InspectionController@create')->name('inspection.create');

Route::get('/application/yearly', 'HomeController@applicationYearly')->name('application.yearly');
Route::get('/premise/category', 'HomeController@premiseCategory')->name('premise.category');


Route::get('/pdf', 'PdfController@test');




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

use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {


    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::get('/premise', 'PremiseController@index')->name('premise.index');
    Route::get('/premise/import', 'PremiseController@excel')->name('premise.excel');
    Route::post('/premise/import', 'PremiseController@upload')->name('premise.upload');
    Route::get('/premise/data', 'PremiseController@data')->name('premise.data');
    Route::get('/premise/create', 'PremiseController@create')->name('premise.create');
    Route::post('/premise/store', 'PremiseController@store')->name('premise.store');
    Route::post('/premise/getPremise/', 'PremiseController@getPremise')->name('premise.getPremise');
    Route::get('/premise/{id}', 'PremiseController@show')->name('premise.show');


    Route::get('/application', 'FcApplicationController@index')->name('application.index');
    Route::get('/application/create', 'FcApplicationController@create')->name('application.create');
    Route::post('/application/store', 'FcApplicationController@store')->name('application.store');
    Route::get('/application/data', 'FcApplicationController@data')->name('application.data');
    Route::post('/application/approved/{applicationId}', 'FcApplicationController@approved')->name('application.approved');
    Route::get('/application/approving/{applicationId}', 'FcApplicationController@approving')->name('application.approving');
    Route::get('/application/import', 'FcApplicationController@excel')->name('application.excel');
    Route::post('/application/import', 'FcApplicationController@upload')->name('application.upload');


    Route::get('/application/approved/list', 'ApprovedApplicationController@index')->name('approved.list');
    Route::get('/application/approved/data', 'ApprovedApplicationController@data')->name('approved.data');

    Route::get('/inspection/create/{applicationId}', 'InspectionController@create')->name('inspection.create');

    Route::get('/application/yearly/{year}', 'HomeController@applicationYearly')->name('application.yearly');
    Route::get('/premise/category', 'HomeController@premiseCategory')->name('premise.category');


    Route::get('/pdf', 'PdfController@test');
    Route::get('/notify/send', 'PremiseController@notify')->name('email.notify');

    Route::get('/report', 'ReportController@index')->name('report.index');

    Route::get('/download/format-premise', function () {
        $file = public_path()."/downloads/format-premis.xlsx";
        $headers = array('Content-Type: application/xlsx',);
        return Response::download($file, 'format-premis.xlsx',$headers);
    });

    Route::get('/download/format-file', function () {
        $file = public_path()."/downloads/format-file.xlsx";
        $headers = array('Content-Type: application/xlsx',);
        return Response::download($file, 'format-fail.xlsx',$headers);
    });

    Route::get('/references', 'ReferenceController@index')->name('references');

});



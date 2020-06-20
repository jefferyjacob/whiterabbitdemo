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

Route::get('/', [
    'as' => 'files.index', 'uses' => 'FilesController@index'
]);

Route::post('/upload', [
    'as' => 'files.upload', 'uses' => 'FilesController@upload'
]);

Route::get('/files', [
    'as' => 'files.list', 'uses' => 'FilesController@list'
]);

Route::get('/files/delete/{id}', [
    'as' => 'files.delete', 'uses' => 'FilesController@delete'
]);

Route::get('/files/history/uploaded', [
    'as' => 'files.uploaded', 'uses' => 'FilesController@uploaded'
]);

Route::get('/files/history/deleted', [
    'as' => 'files.deleted', 'uses' => 'FilesController@deleted'
]);
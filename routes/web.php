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

//Home Views
Route::get('/', 'BandController@index');
Route::get('album', 'AlbumController@index');

//Create Views
Route::get('band/create-band', function() { return View::make('create-band'); });
Route::get('album/create-album', 'AlbumController@createView');

//Edit Routes
Route::get('/band/edit-band/{bandId}', 'BandController@edit');
Route::get('/album/edit-album/{albumId}', 'AlbumController@edit');

//Delete Routes
Route::post('/album/delete-album/', 'AlbumController@delete');
Route::post('/band/delete-band/', 'BandController@delete');

//Create Routes
Route::post('/album/create-album/', 'AlbumController@create');
Route::post('/band/create-band/', 'BandController@create');

//Sorted Routes
Route::get('/band/{column}/{sort}', 'BandController@index');
Route::get('/album/{column}/{sort}', 'AlbumController@index');

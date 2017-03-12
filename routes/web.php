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

//Edit Views
Route::get('band/edit-band/{bandId}', 'BandController@editView');
Route::get('album/edit-album/{albumId}', 'AlbumController@editView');

////Edit Routes
Route::post('/band/edit-band/', 'BandController@edit');
Route::post('/album/edit-album/', 'AlbumController@edit');

//Delete Routes
Route::post('/band/delete-band/', 'BandController@delete');
Route::post('/album/delete-album/', 'AlbumController@delete');

//Create Routes
Route::post('/band/create-band/', 'BandController@create');
Route::post('/album/create-album/', 'AlbumController@create');

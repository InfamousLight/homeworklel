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

//Edit Routes
Route::get('/band/edit-band/{bandId}', 'BandController@edit');
Route::get('/album/edit-album/{albumId}', 'AlbumController@edit');

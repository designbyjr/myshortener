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

Route::get('/', 'UrlController@showform');

Route::get('/{string}', 'UrlController@getRedirectUrl');
Route::get('/{string}/stats', 'UrlController@getStats');

Route::post('/generate', 'UrlController@createUrl');

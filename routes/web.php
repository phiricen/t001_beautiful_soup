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

Route::redirect('/', '/article/');

// Route::get('/', function () { return view('welcome'); });
Route::get('/article/', 'ArticleController@list');
Route::get('/article/{site_code}/{article_id}/', 'ArticleController@view');



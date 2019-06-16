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
Route::get('/article/'                         , 'ArticleController@view_index');
Route::get('/article/daily/{date}'             , 'ArticleController@view_daily_article_list');
Route::get('/article/{site_code}/'             , 'ArticleController@view_site_article_list');
Route::get('/article/{site_code}/{article_id}/', 'ArticleController@view_site_article');



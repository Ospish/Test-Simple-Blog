<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\PagesController@home');

Route::get('/articles', 'App\Http\Controllers\PagesController@articles');

Route::get('/articles/{id}', 'App\Http\Controllers\PagesController@article');
Route::post('/articles/{id}/like', 'App\Http\Controllers\ArticleController@like');
Route::post('/articles/{id}/view', 'App\Http\Controllers\ArticleController@view');
Route::post('/articles/{id}/comment', 'App\Http\Controllers\ArticleController@comment');

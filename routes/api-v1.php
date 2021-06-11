<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::resource('languages', 'LanguageController')->only([
    'index',
    'store',
    'update',
    'show'
]);

Route::resource('words', 'WordController')->only([
    'index',
    'store',
    'show'
]);

Route::get('words/language/{id}', 'WordController@getWordsByLanguageId');

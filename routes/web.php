<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'App\Http\Controllers\indexController@indexShow');

Route::get('/history', 'App\Http\Controllers\HistoryController@listShow');

Route::get('/history/{keyword}', 'App\Http\Controllers\HistoryController@keywordShow');

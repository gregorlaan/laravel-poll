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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/polls', 'PollController@index');
Route::get('/poll/create', 'PollController@create');
Route::patch('/poll/{poll}', 'PollController@update');
Route::get('/poll/{poll}/edit', 'PollController@edit');
Route::post('/poll', 'PollController@store');
Route::get('/poll/{poll}', 'PollController@show');

Route::get('/home', 'HomeController@index')->name('home');

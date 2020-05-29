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
    return view('mainPage');
});
Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/posts', 'PostController@showAll');
Route::get('/post/{id}', 'PostController@showOne')->where(['id' => '[0-9]+']);





Route::get('/main', 'MainController@main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

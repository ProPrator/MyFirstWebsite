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

Route::get('/articles', 'ArticleController@showAll');
Route::get('/article/{id}', 'ArticleController@showOne')->where(['id' => '[0-9]+']);
Route::get('/article/deleted/{id}', 'ArticleController@deleted')->where(['id' => '[0-9]+']);
Route::match(['post', 'get'],'/article/edit/{id}', 'ArticleController@edit')->where(['id' => '[0-9]+']);

Route::get('/admin', 'ArticleController@adminMain')->name('admin');
Route::get('/admin/{id}', 'CommentController@allCommentsOfPost')->where(['id' => '[0-9]+']);





Route::get('/main', 'MainController@main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
})->name('main');

Route::get('/articles', 'ArticleController@showAll');
Route::get('/article/{id}', 'ArticleController@showOne')->where(['id' => '[0-9]+'])->name('article');
Route::get('/article/deleted/{id}', 'ArticleController@deleted')->where(['id' => '[0-9]+']);
Route::get('/article/edit/{id}', 'ArticleController@showEditForm')->where(['id' => '[0-9]+']);
Route::post('/article/edit/{id}', 'ArticleController@edit')->where(['id' => '[0-9]+']);
Route::get('/article/add', function () {
    return view('admin.add');
});
Route::post('article/add', 'ArticleController@add');
Route::post('comment/add/{id}', 'CommentController@add')->where(['id' => '[0-9]+']);

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/admin', 'ArticleController@adminMain')->middleware('auth','checkRole')->name('admin');
Route::get('/admin/{id}', 'CommentController@allComments')->middleware('auth','checkRole')->where(['id' => '[0-9]+']);
Route::get('/admin/comment/delete/{id}', 'CommentController@delete')->middleware('auth','checkRole')->where(['id' => '[0-9]+']);






Route::get('/main', 'MainController@main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

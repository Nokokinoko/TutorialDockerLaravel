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

Route::get('/', function () {
    return view('top');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('posts', 'PostController');

Route::get('bbs', 'BbsPostsController@index')->name('bbs_top');
Route::resource('bbs_posts', 'BbsPostsController', ['only' => ['create', 'store', 'show']]);
Route::resource('bbs_comments', 'BbsCommentsController', ['only' => ['store']]);
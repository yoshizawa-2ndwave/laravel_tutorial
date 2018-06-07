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
    return view('welcome');
});
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/posts', 'PostsController', ['only' => ['store', 'create', 'update', 'destroy', 'delete', 'edit']]);
});
Route::resource('/posts', 'PostsController', ['only' => ['index', 'show']]);
Auth::routes();
Route::post('/login', 'Auth\LoginController@authenticate');
Route::Post('/posts/comment', 'PostsController@comment')->name('posts.comment');
Route::get('/home', 'HomeController@index')->name('home');

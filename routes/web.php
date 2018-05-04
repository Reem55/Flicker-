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

Route::get('/', function () { return view('master');
});
Route::get('/posts/post','PostsController@index');
Route::get('/posts/create','PostsController@create');
Route::get('/posts','PostsController@store');
Route::get('/posts,{post}','PostsController@show');
Route::put('/posts/{post}/update','PostsController@update');
Route::post('/posts','PostsController@store');


Route::post('/posts/{post}/comments','Commentscontroller@store')->name('comments.store');

Route::get('/', 'PostsController@index')->name('Master');



Auth::routes();


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
Route::get('/', 'PostsController@index')->name('home');

Route::get('/posts/post','PostsController@index');

Route::get('/posts/create','PostsController@create')->name('posts.create');
Route::get('/posts','PostsController@store');
Route::get('/posts,{post}','PostsController@show')->name('posts.show');
Route::put('/posts/{post}/update','PostsController@update')->name('posts.update');
Route::get('/posts/{post}/edit','PostsController@edit')->name('posts.edit');
Route::post('/posts','PostsController@store');
Route::get('/posts/{post}/delete','PostsController@destroy')->name('posts.delete');



Route::post('/posts/{post}/comments','Commentscontroller@store')->name('comments.store');
Route::get('/comments/{comment}/edit','CommentsController@edit')->name('comments.edit');
Route::get('/comments/{comment}','CommentsController@update')->name('comments.update');
Route::get('/comments/{comment}/delete','CommentsController@destroy')->name('comments.delete');


Route::post('/posts/{post}','VoteController@vote')->name('post.vote');


Route::get('/', 'PostsController@index')->name('Master');



Auth::routes();


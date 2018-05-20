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


//Route::get('/', function () { return view('master');
//});
Route::get('/', 'PostsController@index')->name('home');

// Route::get('/posts/post','PostsController@index');

// no need to write all these route if you gonna follw the laravel convention
Route::resource('/posts', 'PostsController');

Route::post('/posts/{post}/comments','Commentscontroller@store')->name('comments.store');
Route::get('/comments/{comment}/edit','CommentsController@edit')->name('comments.edit');
Route::put('/comments/{comment}','CommentsController@update')->name('comments.update');
Route::get('/comments/{comment}/delete','CommentsController@destroy')->name('comments.delete');

Route::post('/posts/{post}/vote','VoteController@vote')->name('post.vote');

// Route::get('/', 'PostsController@index')->name('Master');



Auth::routes();


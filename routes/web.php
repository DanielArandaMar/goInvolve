<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

// RUTAS DENTRO DE LA APLICACION

Route::get('/', 'HomeController@index')->name('home');

Route::get('/index/{search?}', 'UserController@index')->name('user.index');
Route::get('/user-edit-data', 'UserController@config')->name('user.config');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/get-image-user/{imageName}', 'UserController@getImage')->name('user.get-image');
Route::get('/user-profile/{id}', 'UserController@profile')->name('user.profile');

Route::post('/post/save', 'PostController@upload')->name('post.save');
Route::get('/post-detail/{id}', 'PostController@details')->name('post.detail');
Route::get('/upload-post', 'PostController@uploadPost')->name('post.upload');
Route::get('/my-favorites', 'PostController@favorites')->name('post.favorites');
Route::get('/get-image-post/{fileName}', 'PostController@getImage')->name('post.get-image');
Route::get('/edit-post/{id}', 'PostController@editPost')->name('post.edit');
Route::post('/post/edit', 'PostController@update')->name('post.update');


Route::post('/comment/save', 'CommentController@save')->name('comment.save');
Route::get('/comment/remove/{id}', 'CommentController@remove')->name('comment.remove');

Route::get('/like/save/{postId}', 'LikeController@like')->name('like');
Route::get('/like/delete/{postId}', 'LikeController@dislike')->name('dislike');


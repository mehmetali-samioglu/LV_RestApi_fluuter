<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){

    Route::get('categories','CategoryController@index')->name('categories');
    Route::get('categories/{id}','CategoryController@show');
    Route::post('categories','CategoryController@store')->name('save-category');

    Route::get('tags','TagController@index')->name('tags');
    Route::get('tags/{id}','TagController@show');
    Route::post('tags','TagController@store')->name('save-tag');


    Route::get('comments','CommentController@index')->name('comments');
    Route::get('comments/{id}','CommentController@show');
    Route::post('comments','CommentController@store')->name('save-comment');

    Route::get('users','UserController@index')->name('users');

    Route::get('posts','PostController@index')->name('posts');
    Route::get('posts/{id}','PostController@show')->name('show-post');
    Route::get('new-post','PostController@newPost')->name('add-post');
    Route::post('new-post','PostController@store')->name('save-post');



});

Route::get('/home', 'HomeController@index')->name('home');



Auth::routes(['verify' => true]);
Auth::routes();


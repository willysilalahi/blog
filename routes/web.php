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

use Illuminate\Support\Facades\Route;
Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/category', 'CategoryController');
    Route::resource('/tag', 'TagController');
    Route::get('/post/trashed', 'PostController@trashed')->name('post.trashed');
    Route::get('/post/restore/{post}', 'PostController@restore')->name('post.restore');
    Route::delete('/post/kill/{post}', 'PostController@kill')->name('post.kill');
    Route::resource('/post', 'PostController');
    Route::resource('/user', 'UserController');


    Route::get('/calendar', 'PostController@calendar')->name('post.calendar');
    Route::get('/event', 'PostController@event')->name('post.event');

});

Route::get('/', 'BlogController@index');
Route::get('/posts/{slug}', 'BlogController@show')->name('single.post');
Route::get('/posts-list', 'BlogController@posts_list')->name('posts.list');
Route::get('/categories/{category}', 'BlogController@categories')->name('blog.categories');
Route::get('/tags/{tag}', 'BlogController@tags')->name('blog.tags');
Route::get('/search', 'BlogController@search')->name('search');
Route::post('/store_post_comment', 'BlogController@store_post_comment')->name('store.post_comment');







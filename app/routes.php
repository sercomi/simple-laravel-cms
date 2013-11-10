<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//Admin routes
Route::get('login', ['as' => 'login', 'prefix' => 'admin', 'uses' => 'Admin\SessionsController@create']);

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function(){
        return Redirect::route('dashboard');
    });
    Route::resource('sessions', 'Admin\SessionsController', ['only' => ['create', 'store']]);
});

Route::group(['prefix' => 'admin', 'before' => 'auth'], function() {

    Route::get('logout', ['as' => 'logout', 'uses' => 'Admin\SessionsController@destroy']);
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'Admin\PostsController@index']);
    Route::resource('posts', 'Admin\PostsController');
    Route::resource('tags', 'Admin\TagsController');
    Route::resource('users', 'Admin\UsersController');
    Route::resource('media', 'Admin\MediaController', ['except' => ['edit', 'update', 'show']]);
});

//Static routes
Route::get('about', function(){
    return View::make('web.about');
});

Route::resource('contact', 'ContactController', ['only' => ['index', 'store']]);

//CMS routes
Route::get('/', ['as' => 'home', 'uses' => 'PostsController@index']);

Route::get('/tag/{slug}', ['as' => 'tags.show', 'uses' => 'TagsController@show']);
Route::get('/{slug}', ['as' => 'posts.show', 'uses' => 'PostsController@show']);


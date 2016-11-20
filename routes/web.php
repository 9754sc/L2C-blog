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

Route::get('/', function() {
    return view('welcome');
} );

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    Route::get('logout', function () {
        Auth::logout();
        return redirect()->to('/');
    });

    Route::get('home', 'PostController@index');

//    Route::resource('post', 'PostController', ['except' => 'show']);
    Route::resource('post', 'PostController');
    Route::resource('user', 'UserController');
    Route::resource('tag', 'TagController');

    // This should be at the bottom as it catches everything
    Route::get('post/{slug}', ['as' => 'post.show', 'uses' => 'PostController@show']);
    Route::get('tag/{slug}', ['as' => 'user.show', 'uses' => 'UserController@show']);
    Route::get('user/{id}/{slug}', ['as' => 'user.show', 'uses' => 'UserController@show']);
});



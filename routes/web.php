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

//Route::get('/', 'PostController@index');
Route::get('/', [ 'middleware' => 'checkAge', function() {
    return view('welcome');
} ]);


//Route::get('user/{id}', 'UserController@show');
//Route::get('tag/{id}', 'TagController@show');
//Route::put('tag/{id}', 'TagController@update');

//Route::get('user/{id}', function ($id) {
//    $aaa = App\User::findOrFail($id);
//    return $aaa->posts;
//});

//Route::get('xxx', 'Auth\LoginController@xxx');
Route::get('xxx', function () {
    return 'xxxxx '. auth::user()->name . ' ===';
});

Auth::routes();


Route::group(['middleware' => 'auth'], function(){

    Route::get('logout', function () {
        Auth::logout();
        return redirect()->to('/');
    });

    Route::resource('post', 'PostController');
    Route::resource('user', 'UserController');
    Route::resource('tag', 'TagController');


//Route::get('/home', 'HomeController@index');
    Route::get('home', 'PostController@index');
});



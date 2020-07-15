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

Route::get('/', 'BabiesController@index');


// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'babies/{baby}'], function () {
      Route::get('logs', 'LogsController@index')->name('logs.index');
    });
    Route::resource('babies', 'BabiesController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'show']]);
    Route::resource('logs', 'LogsController' ,  ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    
});

Route::get('averages', 'AveragesController@index')->name('averages.index');
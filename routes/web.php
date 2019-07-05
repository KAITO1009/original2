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

Route::get('/', function () {
    return view('welcome');
})->name("top");


//登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


Route::get('meditation/{any?}', 'Meditation_recordsController@index')->name("meditation")->where('any', ".+");

Route::get('trainning/{any?}', 'Trainning_recordsController@index')->name("trainning")->where('any', '.+');

Route::get('exw/{any?}', 'Exw_recordsController@index')->name("exw")->where('any', '.+');

Route::group(['middleware' => 'auth'], function(){
    Route::resource('users', 'UsersController', ['only' => 'show']);
    Route::get('exw/show/{id}', 'Exw_recordController@show')->name('exw.show');
    
    
    Route::post('meditation', 'Meditation_recordsController@store')->name("meditation.store");
    Route::post('trainning', 'Trainning_recordsController@store')->name("trainning.store");
    Route::post('exw', 'Exw_recordsController@store')->name("exw.store"); 
    
});

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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/signin', 'UserController@getLogin')->name('user.login');
Route::get('/forgot', 'UserController@getForgot')->name('user.forgot');
Route::get('/register', 'UserController@getRegister')->name('user.register');
Route::get('/register/detail', 'UserController@getRegisterDetail')->name('user.register_detail');
Route::get('/register/otp', 'UserController@getRegisterOtp')->name('user.register_otp');

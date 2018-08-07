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

Route::get('home', 'HomeController@index')->name('home');

Route::get('signin', function () {
	return view('frontend/user_login');
})->name('signin');
Route::post('signin', 'Auth\AuthController@postLogin');
Route::get('/signout', 'Auth\AuthController@getLogout')->name('signout');


Route::get('/forgot', 'Auth\AuthController@getForgot')->name('user.forgot');
Route::get('/register', 'Auth\AuthController@getRegister')->name('user.register');

Route::get('/register/detail', 'Auth\AuthController@getRegisterDetail')->name('user.register_detail');
Route::get('/register/otp', 'Auth\AuthController@getRegisterOtp')->name('user.register_otp');

Route::get('/profile', 'Auth\AuthController@getProfile')->name('user.profile');

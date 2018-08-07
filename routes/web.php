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


Route::get('/forgot', 'MemberController@getForgot')->name('user.forgot');
Route::get('/register', 'MemberController@getRegister')->name('user.register');
Route::post('/submit_registration', 'MemberController@registration')->name('user.submit_registration');
Route::get('/register/otp', 'MemberController@getRegisterOtp')->name('user.register_otp');
Route::get('/register/detail', 'MemberController@getRegisterDetail')->name('user.register_detail');

Route::get('/profile', 'MemberController@getProfile')->name('user.profile');

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index')->name('home');
Route::get('ranking', 'RanksController@index')->name('ranking');
Route::get('match', 'PageController@getMatchList')->name('match');
Route::get('match/predict', 'PageController@getMatchPredict')->name('match.predict');

Route::get('prize', 'PageController@getPrizePage')->name('prize');
Route::get('rules', 'PageController@getRulesPage')->name('rules');

Route::get('signin', function () {
	return view('frontend/user_login');
})->name('signin');
Route::post('signin', 'Auth\AuthController@postLogin');

Route::get('/signout', 'Auth\AuthController@getLogout')->name('signout');

Route::get('/forgot', 'MemberController@getForgot')->name('user.forgot');
Route::get('/forgot_password', 'MemberController@getForgotPassword')->name('user.change_password');
	Route::post('/forgot_password', 'MemberController@postForgotPassword');
Route::get('/register', 'MemberController@getRegister')->name('user.register');
Route::post('/submit_registration', 'MemberController@registration')->name('user.submit_registration');
Route::get('/register/otp', 'MemberController@getRegisterOtp')->name('user.register_otp');
  Route::post('/register/otp', 'MemberController@getRegisterOtp');
Route::get('/register/detail', 'MemberController@getRegisterDetail')->name('user.register_detail');

Route::get('/profile', 'MemberController@getProfile')->name('user.profile');
Route::get('/profile/history', 'MemberController@getHistory')->name('user.history');


<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\File;
use Illuminate\Http\Request;

use Auth, Config, Redirect, Validator, View;

class UserController extends Controller
{

    public function getLogin()
	{
		$data = array();

		return View::make('frontend/user_login')
			->with($data);
	}

	public function getRegister()
	{
		$data = array();

		return View::make('frontend/user_register_1')
			->with($data);
	}

	public function getRegisterDetail()
	{
		$data = array();

		return View::make('frontend/user_register_2')
			->with($data);
	}

	public function getRegisterOtp()
	{
		$data = array();

		return View::make('frontend/user_otp')
			->with($data);
	}

	public function getForgot()
	{
		$data = array();

		return View::make('frontend/user_forgot')
			->with($data);
	}

}


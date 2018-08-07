<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Http\File;
use Illuminate\Http\Request;

use Auth, Config, Redirect, Validator, View;

class AuthController extends Controller
{

    public function getLogin()
	{
		// $data = array();

		// return View::make('frontend/user_login')
		// 	->with($data);
	}

	public function postLogin()
    {
        // $this->logger->action(__METHOD__, "start");

        // $rules = [
        //     'username' => 'required',
        //     'password' => 'required'
        // ];

        // $this->validate($this->request, $rules);
        // $data =  $this->request->only(array_keys($rules));

        // $user = [
        //   'username' => $data['username'],
        //   'password' => $data['password'],
        //   'active' => 1,
        //   'auth_type'=> 'local'
        // ]; 
        // // $this->logger->action(__METHOD__, "end");
        // if(Auth::attempt($user)) {

        //     $user = Auth::user();
        //     return $this->sendLoginResponse($this->request);
        // } else {

        //     return $this->sendFailedLoginResponse($this->request);
        // }
    }

    public function getLogout()
    {
        $this->request->session()->flush();
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

	public function getProfile()
	{
		$data = array();

		return View::make('frontend/user_profile')
			->with($data);
	}

}


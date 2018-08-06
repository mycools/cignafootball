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

}


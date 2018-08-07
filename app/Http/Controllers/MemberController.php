<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class MemberController.
 *
 * @package namespace App\Http\Controllers;
 */
class MemberController extends Controller
{
    
    public function getRegister()
    {
        $data = array();

        return View('frontend/user_register')
            ->with($data);
    }

    public function getRegisterDetail()
    {
        $data = array();

        return View('frontend/user_register_1')
            ->with($data);
    }

    public function getRegisterOtp()
    {
        $data = array();

        return View('frontend/user_otp')
            ->with($data);
    }

    public function getForgot()
    {
        $data = array();

        return View('frontend/user_forgot')
            ->with($data);
    }

    public function getProfile()
    {
        $data = array();

        return View('frontend/user_profile')
            ->with($data);
    }
}

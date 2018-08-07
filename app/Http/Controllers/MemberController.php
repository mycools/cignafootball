<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class MemberController.
 *
 * @package namespace App\Http\Controllers;
 */
class MemberController extends Controller
{
    private $_data = [];

    public function getProfile(Request $request)
    {
        // $data = array();

        // return View('frontend/user_profile')
        //     ->with($data);

        $id   = Auth::user()->id;
        $user = User::find($id);

        
        $this->_data['result']    = $user;

        return view('frontend/user_profile')->with($this->_data);

    }

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

}

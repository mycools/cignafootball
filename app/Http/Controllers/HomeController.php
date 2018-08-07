<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\OneTimePassword;
use App\Models\UserOtp;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //Request OTP
        // $otp = UserOtp::getOtp($request);
        // $request->user()->notify(new OneTimePassword($otp));
        //Check Valid OTP
        // $otp = UserOtp::checkValidOtp($request,'AYR9','854316');
        // dd($otp);
        //Use OTP
        // $otp = UserOtp::useOtp($request,'AYR9','854316');
        // dd($otp);
        return view('home');
    }
}

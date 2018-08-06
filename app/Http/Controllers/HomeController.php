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
        $otp = UserOtp::getOtp($request);

        $request->user()->notify(new OneTimePassword($otp));
        return view('home');
    }
}

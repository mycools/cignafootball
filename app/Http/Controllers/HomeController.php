<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\OneTimePassword;
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


        //$request->user()->notify(new OneTimePassword());
        return view('home');
    }
}

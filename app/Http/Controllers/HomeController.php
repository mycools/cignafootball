<?php

namespace App\Http\Controllers;

use App\Models\Ranks;
use App\Models\Users;

use Illuminate\Http\Request;
use App\Notifications\OneTimePassword;
use App\Models\UserOtp;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
    public function index()
    {
        // $auth   = Auth::user();
        // if(!$auth)
        // {
        //     return redirect('/');
        // }
        $result = Ranks::with([
                            'getUser'
                        ])
                        ->where('ranking_no', '!=', '0')
                        ->orderBy('point', 'desc')
                        ->orderBy('user_id', 'asc')
                        ->take(10)
                        ->get();

        $this->_data['result']    = $result;

        return view('frontend.home')->with($this->_data);
    }

}

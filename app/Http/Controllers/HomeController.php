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
        $result = Ranks::with([
                            'getUser'
                        ])
                        ->orderBy('ranking_no', 'asc')
                        ->where('ranking_no', '!=', '0')
                        ->take(10)
                        ->get();

        $this->_data['result']    = $result;

        return view('frontend.home')->with($this->_data);
    }

}

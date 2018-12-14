<?php

namespace App\Http\Controllers;

use App\Models\Ranks;
use App\Models\Users;
use App\Models\Tips;
use Illuminate\Http\Request;
use App\Notifications\OneTimePassword;
use App\Models\UserOtp;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
    public function index()
    {
        $health = Tips::limit(1)->orderBy('seq', 'ASC')->get();
        //$football = Tips::where('category', 2)->orderBy('id', 'DESC')->first();
        
        $result = Ranks::with([
                            'getUser'
                        ])
                        ->where('ranking_no', '!=', '0')
                        ->where('id', '!=', '3')
                        ->where('id', '!=', '16594')
                        ->orderBy('invitee_count', 'desc')
                        ->orderBy('user_id', 'asc')
                        ->take(10)
                        ->get();

        $this->_data['result']    = $result;
        $this->_data['rs']    = $health;
        //$this->_data['football']    = $football;

        return view('frontend.home')->with($this->_data);
    }

}

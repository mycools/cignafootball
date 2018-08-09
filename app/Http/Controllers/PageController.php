<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\OneTimePassword;
use App\Models\UserOtp;
class PageController extends Controller
{

    public function getRulesPage()
    {

        return view('frontend.rules');
    }

    public function getPrizePage()
    {

        return view('frontend.prize');
    }
   
    public function getMatchList()
    {

        return view('frontend.match_list');
    }

    public function getMatchPredict()
    {

        return view('frontend.match_predict');
    }
}

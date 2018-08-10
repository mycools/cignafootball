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
   
    public function getTipsPage()
    {

        return view('frontend.tips');
    }

    public function getTipsDetailPage()
    {

        return view('frontend.tips_detail');
    }
}

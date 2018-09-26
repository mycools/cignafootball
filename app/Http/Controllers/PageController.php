<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Notifications\OneTimePassword;
use App\Models\UserOtp;
use App\Models\Tips;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

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
        $hilight = Tips::where('seq', 1)->first();
        $result = Tips::where('seq', '!=', 1)->orderBy('seq', 'ASC')->paginate(3);

        $this->_data['hilight'] = $hilight;
        $this->_data['result'] = $result;

        return view('frontend.tips')->with($this->_data);
    }

    public function getTipsDetailPage($id)
    {
        $detail = Tips::find($id);
        $lastest = Tips::where('id', '!=', $detail->id)->orderBy('id', 'DESC')->limit(3)->get();
        $this->_data['detail'] = $detail;
        $this->_data['lastest'] = $lastest;
        return view('frontend.tips_detail')->with($this->_data);
    }
}

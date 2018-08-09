<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Entities\Match as Matchs;
use App\Models\Match;
use App\Models\Bets;
use App\Models\PointLogs;
use App\Models\User;
use Carbon\Carbon;

/**
 * Class MatchesController.
 *
 * @package namespace App\Http\Controllers;
 */

class MatchesController extends Controller
{
    private $_data = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $now = Carbon::now();
      $now = $now->toDateTimeString();
      $match = Matchs::with(['TeamA', 'TeamB'])->where('match_start', '<', $now)->where('match_end', '>', $now)->first();
      $this->_data['matchInfo'] = $match;

        return view('frontend.match_list')->with($this->_data);
    }

    public function predict(Request $request, $id)
    {
        $auth   = Auth::user();
        $match  = Match::find($id);

        if($match) {

            if($auth) {

                $user = User::find($auth->id);

                if ($request->isMethod('post')) {

                    $bets = new Bets;
                    $bets->user_id = $user->id;
                    $bets->match_id = $id;
                    $bets->predicted_team = $request->vote_team;
                    $bets->save();

                    return redirect()->route('match');

                } else {


                    return view('frontend.match_predict')->with($this->_data);
                }

            } else {

                return redirect()->route('signin', ['action=match/predict/'.$id]);
            }
        } else {


            return redirect()->route('match');
        }
    }
}

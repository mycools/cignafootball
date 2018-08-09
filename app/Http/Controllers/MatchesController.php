<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Entities\Match as Matchs;
use App\Models\Match;
use App\Models\Bets;
use App\Models\PointLogs;
use App\Models\User;
use App\Models\BetLogs;
use App\Models\Ranks;
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

      // get team now
      $match = Matchs::with(['TeamA', 'TeamB'])
                            ->where('match_start', '<', $now)
                            ->where('match_end', '>', $now)
                            ->first();

      // get previous Match
      $previousMatch = Matchs::with(['TeamA', 'TeamB'])
                            ->where('match_end', '<', $now)
                            ->orderBy('match_end', 'desc')
                            ->limit(3)
                            ->offset(0)
                            ->get();

      $this->_data['matchInfo'] = $match;
      $this->_data['previousMatch'] = $previousMatch;

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

                    // check duplicate bet
                    $dupBet = Bets::where('match_id', $id)->where('user_id', $auth->id);
                    if ($dupBet->count() > 0) {
                      // in case of duplicate(update)
                      $bets = $dupBet->first();
                    } else {
                      // in case of not duplicate(insert)
                      $bets = new Bets;
                      $rank = Ranks::where('user_id', $auth->id)->first();
                      $rank->predict_count = (int)$rank->predict_count + 1;
                      $rank->save();
                    }
                    $bets->user_id = $user->id;
                    $bets->match_id = $id;
                    $bets->predicted_team = $request->vote_team;
                    $bets->save();

                    $betLogs = new BetLogs;
                    $betLogs->user_id = $user->id;
                    $betLogs->match_id = $id;
                    $betLogs->predicted_team = $request->vote_team;
                    $betLogs->save();

                    echo"<body onload=\"window.alert('ระบบได้เพิ่มข้อมูลให้แล้วค่ะ');\">";

                    return redirect()->route('match');

                } else {
                    // where match by id
                    $matchInfo = Matchs::with(['TeamA', 'TeamB'])->where('id', $id)->first();
                    $this->_data['matchInfo'] = $matchInfo;

                    // check has bet
                    $historyBet = Bets::where('user_id', $auth->id)
                                      ->where('match_id', $id);
                    if ($historyBet->count() > 0) {
                      $lastBet = $historyBet->first();
                      $this->_data['lastBet'] = $lastBet;
                    }

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

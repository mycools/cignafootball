<?php

namespace App\Http\Controllers;

use App\Models\Ranks;
use App\Models\Users;
use App\Models\Match;
use App\Models\Bets;
use App\Models\Invites;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RankCreateRequest;
use App\Http\Requests\RankUpdateRequest;
use App\Repositories\RankRepository;
use App\Validators\RankValidator;
use Illuminate\Support\Facades\Auth;

/**
 * Class RanksController.
 *
 * @package namespace App\Http\Controllers;
 */
class RanksController extends Controller
{
    public function index()
    {
        $user   = Auth::user();
        $this->_data['user_id'] = ( $user ? $user->id : '' );
        // dd($user->id);
        $result = Ranks::leftJoin('users', 'ranks.user_id', '=', 'users.id')
                        ->where('ranks.ranking_no', '!=', '0')
                        ->where('users.username', '!=', '')
        				->orderBy('ranks.point', 'desc')
                        ->orderBy('ranks.user_id', 'asc')
        				->take(50)
						->get();
        // foreach($result as $rs) {
        //     $query = Bets::with(['team','match'])->where('user_id', $rs['user_id'])->orderBy('created_at','ASC')->get();
        //     // $this->_data['bets'] = $query->get();
        //     $this->_data['win'] = $query->where('bet','win')->count();
        //     $this->_data['lose'] = $query->where('bet','lose')->count();
        //     return $query;
        // }

        // $this->_data['invite'] = Invites::with(['getUser'])->where('user_id', $id)->get();

        $this->_data['result']    = $result;
        // return $this->_data['win'];

        return view('frontend.ranking')->with($this->_data);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Ranks;
use App\Models\Users;

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
        $result = Ranks::with([
        					'getUser'
						])
        				->orderBy('ranking_no', 'asc')
                        ->where('ranking_no', '!=', '0')
        				->take(30)
						->get();

        $this->_data['result']    = $result;

        return view('frontend.ranking')->with($this->_data);
    }
}
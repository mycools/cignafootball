<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use App\Models\Salary;
use App\Models\Title;
use App\Models\User;
use App\Models\Teams;

use App\Models\UserOtp;
use App\Notifications\OneTimePassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class MemberController.
 *
 * @package namespace App\Http\Controllers;
 */
class MemberController extends Controller
{
    private $_data = [];

    public function getProfile(Request $request)
    {
        // $data = array();

        // return View('frontend/user_profile')
        //     ->with($data);

        $id   = Auth::user()->id;
        $user = User::find($id);
        
        $this->_data['result']    = $user;
        $this->_data['team']     = Teams::where('id', $user->team_id)->first();

        return view('frontend/user_profile')->with($this->_data);

    }

    public function getRegister()
    {
        $this->_data['salaries'] = Salary::all();
        $this->_data['occupations'] = Occupation::all();
        $this->_data['titles'] = Title::all();
        $this->_data['teams'] = Teams::all();

        return View('frontend/user_register')
            ->with($this->_data);
    }

    public function getRegisterDetail()
    {
        $data = array();

        return View('frontend/user_register_1')
            ->with($data);
    }

    public function getRegisterOtp()
    {
        $data = array();

        return View('frontend/user_otp')
            ->with($data);
    }

    public function getForgot()
    {
        $data = array();

        return View('frontend/user_forgot')
            ->with($data);
    }

    public function registration(Request $request){
//        return $request;
        try{
            if($request->isMethod('post')) {
                $validator = $this->_validator($request->all());
                if ($validator->fails()) {
                    return redirect()
                        ->route('user.register')
                        ->withErrors($validator)
                        ->withInput();
                }

                $user = new User;
                $user->title_id = $request->title_id;
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->birthdate = $request->birthdate;
                $user->salary_id = $request->salary_id;
                $user->occupation_id = $request->occupation_id;
                $user->team_id = $request->team_id;
                $user->phoneno = $request->phoneno;
                $user->save();
                if($user){
                    return $user;
                }else{
                    return 'error';
                }
//                $otp = UserOtp::getOtp($request->phoneno);
//                $request->user()->notify(new OneTimePassword($otp));

                // FIXME send ref CODE otp to next page
//                return redirect()->route('user.register_otp');
            }
        }catch (ValidatorException $e){
            return $e->getMessageBag();
        }
    }

    private function _validator(array $data){
        return Validator::make($data, [
            'title_id'  => 'required',
            'first_name'  => 'required|max:150',
            'last_name'  => 'required|max:150',
            'email'  => 'required|email|exists:users,email',
            'birthdate'  => 'date_format:"Y-m-d"',
            'salary_id'  => 'required|integer',
            'occupation_id'  => 'required|integer',
            'team_id'  => 'required|integer',
            'phoneno'  => 'required|string|max:10|exists:users,phoneno'
        ]);
    }
}

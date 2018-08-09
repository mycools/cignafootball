<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\Occupation;
use App\Models\Ranks;
use App\Models\Salary;
use App\Models\Title;
use App\Models\User;
use App\Models\Teams;
use App\Entities\Invite;
use App\Models\Bets;
use Illuminate\Support\Facades\DB;

use App\Models\UserOtp;
use App\Notifications\OneTimePassword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Roles\CurrentPassword;

/**
 * Class MemberController.
 *
 * @package namespace App\Http\Controllers;
 */
class MemberController extends Controller
{
    private $_data = [];

    private function _validatorPassword(array $data)
    {
        return Validator::make($data, [
          'current_password' => ['required', new CurrentPassword()],
          'password' => 'required|min:8|max:16|confirmed'
        ]);
    }

    private function flash_messages($request, $status, $messages)
    {
        $request->session()->flash('flash_messages', ['status' => $status, 'messages' => $messages]);
    }


    public function getProfile(Request $request)
    {
        $id   = Auth::user();
        if($id) {
            $id = $id->id;
            $user = User::find($id);

            // $this->_data['result']    = $user;
            $result = User::with([
                                'getRank'
                            ])->find($id);

            $this->_data['result']    = $result;

            $this->_data['team']     = Teams::where('id', $user->team_id)->first();
            $this->_data['inviteUrl'] = $user->ref_code;

            return view('frontend/user_profile')->with($this->_data);
        } else {

            return redirect()->route('home');
        }
    }

    public function getHistory(Request $request)
    {
        $id   = Auth::user()->id;
        $user = User::find($id);

        $query = Bets::with(['team','match'])->where('user_id', $user->id)->orderBy('created_at','ASC')
                            ->limit(38);
        $this->_data['bets'] = $query->get();
        $this->_data['win'] = $query->where('bet','win')->count();
        $this->_data['lose'] = $query->where('bet','lose')->count();
//        return $this->_data['bets'];
        return view('frontend/user_history')->with($this->_data);

    }

    //FIXME validate form in client
    public function getRegister()
    {
        $this->_data['salaries'] = Salary::all();
        $this->_data['occupations'] = Occupation::all();
        $this->_data['titles'] = Title::all();
        $this->_data['teams'] = Teams::all();

        return View('frontend/user_register')
            ->with($this->_data);
    }

    public function registerHasRefcode(Request $request, $ref)
    {
      if ($ref) {
        $request->session()->put('refCode', $ref);
      }

      $this->_data['salaries'] = Salary::all();
      $this->_data['occupations'] = Occupation::all();
      $this->_data['titles'] = Title::all();
      $this->_data['teams'] = Teams::all();

      return View('frontend/user_register')
          ->with($this->_data);
    }

    public function getRegisterDetail(Request $request)
    {
      if ($request->isMethod('post')) {
        // in case of submit form

        // validate username and password
        $validated = Validator::make($request->all(), [
          'username' => 'required',
          'password' => 'required|min:8|max:16|confirmed'
        ]);

        if ($validated->fails()) {
            $this->flash_messages($request, 'danger', 'Please check username and password again!');
            return redirect('register/detail')
                ->withErrors($validated)
                ->withInput();
        }

        // get user from session and find by user_id
        $userId = $request->session()->get('user_id');
        $user = User::find($userId);

        // check duplicate username
        $dupUsername = User::where('username', $request->username)->count();
        if ($dupUsername > 0) {
          // in case of duplicate
          $this->flash_messages($request, 'danger', 'Duplicate username!');
          return redirect('register/detail')
              ->withErrors($validated)
              ->withInput();
        }

        // update username and password
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        // Save Log
            $inInvite = Invite::select('user_id','invitee_id')->where('invitee_id',$user->id)->get();
            if($inInvite->count() > 0) {
              $inInvite = $inInvite->first();
              $invite = $inInvite->toArray();
              $invite['point_type'] = 'inv';
              $invite['point_score'] = 1;

              $user = User::find($inInvite->invitee_id);

                Ranks::where('user_id', $inInvite->user_id)
                    ->update(
                      [
                        'point' => DB::raw('point+1')
                      ]
                    );

                // Re Ranks
                    $getRanks = Ranks::orderBy('point', 'desc')
                                ->take(30)
                                ->pluck('id')->toArray();

                    foreach ($getRanks as $key => $value) {
                      
                      $ranks = Ranks::find($value);
                      $ranks->ranking_no = ($key+1);
                      $ranks->save();
                    }
            }

        // FIXME redirect to where?
            $usr = User::find($user->id);
            Auth::login($usr,true);

            if(Auth::check($usr)) {

                return redirect()->route('user.profile');
            } else {

                return redirect()->route('home');
            }

      } else {
        // in case of first call page
        $data = array();
        return View('frontend/user_register_1')
            ->with($data);
      }
    }

    public function getRegisterOtp(Request $request, $otp)
    {
      if($request->isMethod('post')) {
        // in case of submit form

        // validate request
        $rules = [
          "otp" => "required|min:6|max:6"
        ];
        $validated = Validator::make($request->all(), $rules);

        if ($validated->fails()) {
            //FIXME redirect if validator fail
            $this->flash_messages($request, 'danger', 'Invalid OTP!');
            return redirect('register/otp')
                ->withErrors($validated)
                ->withInput();
        }

        //get user_id from session
        $userId = $request->session()->get('user_id');

        // Check Valid OTP
        $user = User::find($userId);
        $otp = UserOtp::checkValidOtp($user,$request->otp,$request->refcode);

        if ($otp > 0) {
          // in case of matched OTP
          $otp = UserOtp::useOtp($user,$request->refcode,$request->otp);
          return redirect('register/detail');
        } else {
          // in case of don't matched OTP
          $this->flash_messages($request, 'danger', 'Invalid OTP');
          return redirect('register/otp')->withInput();
        }

      } else {
        // in case of first call page

        // get user_id form session
        $userId = $request->session()->get('user_id');
        $user = User::find($userId);

        // Generate OTP
        $otp = UserOtp::getOtp($user);

        // set refcode for display in frontend
        $this->_data['refcode'] = $otp['refcode'];

        // Sent OTP
        $user->notify(new OneTimePassword($otp));

        $data = array();
        return View('frontend/user_otp')
            ->with($this->_data);
      }
    }

    public function getForgot()
    {
        $data = array();

        return View('frontend/user_forgot')
            ->with($data);
    }

    public function getForgotPassword()
    {
        $data = array();

        return View('frontend/user_forgot_change')
            ->with($data);
    }

    public function registration(Request $request){
        try{
            if($request->isMethod('post')) {
                $validator = $this->_validator($request->all());
                if ($validator->fails()) {
                    //FIXME redirect if validator fail
                    $this->flash_messages($request, 'danger', 'Please check value on input');
                    return redirect('register')
                        // ->route('user.register')
                        ->withErrors($validator)
                        ->withInput();
                }

                /*gen ref code*/
                for ($i=0; $i<1;){
                    $ref_code = $this->_generateRandomString();
                    $query = User::where('ref_code',$ref_code);
                    if($query->count()==0){
                        $i++;
                    }else{
                        $i=0;
                    }
                }
                /*insert user*/
                $user = new User;
                $user->title_id = $request->title_id;
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->birthdate = date("Y-m-d", strtotime($request->birthdate));
                $user->salary_id = $request->salary_id;
                $user->occupation_id = $request->occupation_id;
                $user->team_id = $request->team_id;
                $user->phoneno = $request->phoneno;
                //FIXME default username, password
                $user->username = $request->email;
                $user->password = bcrypt($ref_code); // password not null
                $user->ref_code = $ref_code;
                $user->save();

                $rank = new Ranks;
                $rank->user_id = $user->id;
                $rank->save();


                // check has refCode(invite case)
                if ($request->session()->get('refCode')) {
                  // in case of invite
                  $refCode = $request->session()->get('refCode');
                  $userInviter = User::where('ref_code', $refCode)->first();

                  // set user_id and invitee_id for insert
                  // $obj = [
                  //   'user_id' => $userInviter->id,
                  //   'invitee_id' => $user->id
                  // ];

                    $inInvite = new Invite;
                    $inInvite->user_id = $userInviter->id;
                    $inInvite->invitee_id = $user->id;
                    $inInvite->save();

                    // $invite = $inInvite->toArray();
                    // $invite['point_type'] = 'inv';
                    // $invite['point_score'] = 1;

                    // $user = User::find($user->id);
                    // $user->pointlogs()->create($invite);
                }

                // set user_id session
                if($user){
                    $request->session()->put('user_id', $user->id);
                    return redirect('register/otp');
                }else{
                  $this->flash_messages($request, 'danger', 'registration process has failed!');
                  return redirect('register')->withInput();
                }
            }
        }catch (ValidatorException $e){
            return $e->getMessageBag();
        }
    }

    //TODO validator email,phone in table user
    private function _validator(array $data){
        return Validator::make($data, [
            'title_id'  => 'required|integer',
            'first_name'  => 'required|String|max:150',
            'last_name'  => 'required|String|max:150',
            'email'  => 'required|email|unique:users,email',
            'birthdate'  => 'required|date',
            'salary_id'  => 'required|integer',
            'occupation_id'  => 'required|integer',
            'team_id'  => 'required|integer',
            'phoneno'  => 'required|string|max:10|unique:users,phoneno'
        ]);
    }

    private function _generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function postForgotPassword(Request $request)
    {
        $id   = Auth::user()->id;
        $user = User::find($id);

        if($user) {

          if($request->isMethod('post')) {

            $validator        = $this->_validatorPassword($request->all());

            if ($validator->fails()) {

                return redirect()
                            ->route('user.profile')
                            ->withErrors($validator)
                            ->withInput();
            }

            if($request->password) {
              $user->password  = bcrypt($request->password);
            }

            $user->save();

            if($request->password) {

              $validator->errors()->add('change_password', 'Change your password success!');

              $request->session()->flush();
              return redirect()->route('user.signin');
            }

            $this->flash_messages($request, 'success', 'Success!');

            return redirect()->route('user.profile');
          } else {

            return redirect()->route('user.profile');

          }
        } else {

          return redirect()->route('user.change_password');
        }
    }


    public function sentEmailForgotPassword(Request $request){
        try{
            if($request->isMethod('post')) {
                $user = User::where('email',$request->email);
                if($user->count()>0){
                    $user = $user->first();
                    $user->remember_token = $this->_generateRandomString(30);
                    $user->save();
                    $url = url('/forgot_password?remember_token='.$user->remember_token);
                    if($user){
                        $sendMail = Mail::to($request->email)->send(new ForgotPassword($url));
                        return redirect()->route('home');
                    }else{
                        $this->flash_messages($request, 'danger', 'Process Error');
                        return redirect()->route('user.forgot');
                    }
                }else{
                    $this->flash_messages($request, 'danger', 'Email Not match');
                    return redirect()->route('user.forgot');
                }
            }else{ return redirect()->route('user.forgot'); }
        }catch (\Exception $e){
            $e->getMessage();
        }
    }

    public function forgotPassword(Request $request){
//        return $request;
        try{
            $rules = [
                'email' => 'required|email',
                'password' => 'required|min:8|max:16|confirmed',
                'remember_token'=> 'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $this->flash_messages($request, 'danger', 'Error input');
                return redirect()
                    ->route('user.change_password?remember_token='.$request->remember_token)
                    ->withErrors($validator)
                    ->withInput();
            }
            $user = User::where([
                'email'=>$request->email,
                'remember_token'=>$request->remember_token
            ]);
            if($user->count()>0){
                $user = $user->first();
                $user->password  = bcrypt($request->password);
                $user->remember_token = null;
                $user->save();
                return redirect()->route('signin');
            }else{
                $this->flash_messages($request, 'danger', 'Email Not match');
                return redirect()->route('user.change_password?remember_token='.$request->remember_token);

            }
        }catch(\Exception $e){
            $e->getMessage();
        }
    }
}

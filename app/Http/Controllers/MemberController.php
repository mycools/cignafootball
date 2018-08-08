<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use App\Models\Salary;
use App\Models\Title;
use App\Models\User;
use App\Models\Teams;

use App\Models\UserOtp;
use App\Notifications\OneTimePassword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $id   = Auth::user()->id;
        $user = User::find($id);

        $this->_data['result']    = $user;
        $this->_data['team']     = Teams::where('id', $user->team_id)->first();

        return view('frontend/user_profile')->with($this->_data);

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

    public function getRegisterDetail()
    {
        $data = array();

        return View('frontend/user_register_1')
            ->with($data);
    }

    public function getRegisterOtp(Request $request)
    {
      if($request->isMethod('post')) {
        $rules = [
          "otp" => "required"
        ];
        $validated = Validator::make($request->all(), $rules);
      } else {
          $data = array();

          return View('frontend/user_otp')
              ->with($data);
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
                    return redirect()
                        ->route('user.register')
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
                if($user){
                    return $user;
                }else{
                    //FIXME return or redirect
                    return 'error';
                }

                // FIXME go next step register
//                return redirect()->route('user.register_otp');
            }
        }catch (ValidatorException $e){
            return $e->getMessageBag();
        }
    }

    //FIXME validator email,phone in table user
    private function _validator(array $data){
        return Validator::make($data, [
            'title_id'  => 'required',
            'first_name'  => 'required|max:150',
            'last_name'  => 'required|max:150',
            'email'  => 'required|email',
            'birthdate'  => 'required',
            'salary_id'  => 'required|integer',
            'occupation_id'  => 'required|integer',
            'team_id'  => 'required|integer',
            'phoneno'  => 'required|string|max:10'
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

}

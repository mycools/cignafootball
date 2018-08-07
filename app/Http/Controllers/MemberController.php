<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teams;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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

    public function getRegister()
    {
        $data = array();

        return View('frontend/user_register')
            ->with($data);
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

    public function getForgotPassword()
    {
        $data = array();

        return View('frontend/user_forgot_change')
            ->with($data);
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

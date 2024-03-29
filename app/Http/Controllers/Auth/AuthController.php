<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Auth Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profile';
    protected $redirectAfterLogout = '/';
    protected $homePath = '/';

    public function getLogin()
    {
        
        return redirect()->route('signin');
        
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        $this->validate($request, $rules);
        $data =  $request->only(array_keys($rules));

        $user = [
          'username' => $data['username'],
          'password' => $data['password']
        ]; 
        
        if(Auth::attempt($user)) {

            $user = Auth::user();

            if($request->action) {
                $this->redirectTo = $request->action;
            } else {
                $this->redirectTo = "profile";
            }

            return $this->sendLoginResponse($request);
        } else {
            
            return $this->sendFailedLoginResponse($request);
        }

    }

    public function getLogout(Request $request)
    {
        $request->session()->flush();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : $this->homePath);
    }

    // public function redirectTo($action=null)
    // {
    //     if($action) {
    //         $url = '/'.$action;
    //     } else {
    //         $url = '/profile';
    //     }

    //     return $url;
    // }

}
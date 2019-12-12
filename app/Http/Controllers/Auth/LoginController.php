<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm() {
        // $user = \Auth::user();
        // $flashInfo = null;
        // if (!is_null($user->email_verified_at)) {
        //     $flashInfo = 'Verifikasi email berhasil dilakukan!';
        //     if (is_null($user->verified)) {
        //         $user->verified = 1;
        //         $user->save();
        //     } else {
        //         $flashInfo = null;
        //     }
        // }

        return view('auth.login');
    }

    /**
     * Where to redirect users after login.
     *
     */
    // protected $redirectTo;
    public function redirectTo() {
        $user = new User;
        return $user->home();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

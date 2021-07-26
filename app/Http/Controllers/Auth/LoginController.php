<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
    public function redirectTo()
    {
        if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 && Auth::user()->status == 1) {
            return 'dashboard';
        } elseif (Auth::user()->id_role == 3 && Auth::user()->status == 1) {
            return '/courses';
        } else {
            Auth::logout();
            Session::flash('status', 'Akun anda sudah tidak aktif. Silahkan hubungi admin');
            return 'login';
        }
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

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Debugbar;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
        if ($this->request->has('previous')) {
            $this->redirectTo = $this->request->get('previous');
        }
        Debugbar::error( $this->redirectTo);

        return $this->redirectTo ?? '/';
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        // $this->middleware('authorize')->only('login');
        $this->middleware('guest')->except('logout');
        $this->request = $request;
    }
}

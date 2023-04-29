<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    // protected function redirectTo()
    // {
    //     if (Auth::guard('employee')->check()) {
    //         return '/employee';
    //     } else {
    //         return '/admin';
    //     }
    // }
    public function redirect($request){

        if($request->type == 'employee'){
            return redirect()->intended(RouteServiceProvider::EMPLOYEE);
        }
        
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    // protected function guard()
    // {
    //     return Auth::guard();
    // }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        
            return view('auth.login');
        }
    
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
            'type' => 'required|in:user,employee',
        ]);

        $credentials = $request->only('email', 'password');
        $type = $request->input('type');

        if ($type === 'employee' && Auth::guard('employee')->attempt($credentials)) {
            return redirect()->intended('/employee');
            // return $request;
        }

        if ($type === 'user' && Auth::guard()->attempt($credentials)) {
            return redirect()->intended('/admin');
        }

        return redirect()->back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
        // return $request;
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $this->guard('employee')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
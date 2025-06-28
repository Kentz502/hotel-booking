<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check()) {
            return redirect('/dashboard');
        }

        return view('pages.auth.login');
    }

     public function authenticate(Request $request)
    {
        if(Auth::check()) {
            return back();
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'password.required' => 'Password is required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $userStatus = Auth::user()->status;


            if ($userStatus == 'submitted') {
                $this->_logout($request);

                return back()->withErrors([
                    'email' => 'Your account is not approved by admin yet']
                );
            } else if($userStatus == 'rejected') {
                $this->_logout($request);
                return back()->withErrors([
                    'email' => 'Your account is rejected by admin']
                );
            }

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password',
        ])->onlyInput('email');
    }

    public function _logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }

    public function logout(Request $request)
    {
        if(!Auth::check()) {
            return redirect('/');
        }

        $this->_logout($request);

        return redirect('/');
    }
}

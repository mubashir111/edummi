<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(){
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    public function resetpassword(){
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('reset-password');
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        // Redirect the user to the login page.
        return redirect()->route('login');
    }
}

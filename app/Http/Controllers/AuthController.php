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
        'email_check' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $emailColumn = 'email'; 

    if (Auth::attempt([$emailColumn => $credentials['email_check'], 'password' => $credentials['password'], 'status' => 'active'])) {
        $user = Auth::user();
        $user->device_token = $request->csrf_token;
        $user->save();

        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    return back()->withErrors([
        'email_check' => 'The provided credentials do not match our records or the user is not active.',
    ]);
}





    public function logout()
    {
        Auth::logout();

        // Redirect the user to the login page.
        return redirect()->route('login');
    }
}

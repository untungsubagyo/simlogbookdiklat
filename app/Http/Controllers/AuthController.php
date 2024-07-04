<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role_id == 1) {
                return redirect()->intended('admin/dashboard');
            } elseif ($user->role_id == 2) {
                return redirect()->intended('guru/dashboard');
            } else {
                return redirect()->intended('dashboard');
            }
        }

        // Authentication failed
        return redirect('/login')->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

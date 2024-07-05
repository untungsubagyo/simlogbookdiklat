<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $username = $user->name;

            if ($user->role_id == 1) {
                return redirect('/admin')->with('username', $username);
            }
            elseif ($user->role_id == 2) {
                return redirect('/guru')->with('username', $username);
            }
            else {
                return view('pages.login');
            }
        }
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
                return redirect()->intended('admin/')->with('username', $user->name);
            } elseif ($user->role_id == 2) {
                return redirect()->intended('guru/');
            } else {
                return redirect()->intended('/');
            }
        }

        // Authentication failed
        return redirect('/')->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

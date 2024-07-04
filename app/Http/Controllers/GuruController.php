<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function index () {
        if (!Auth::check()) {
            return redirect('/');
        } else {
            $user = Auth::user();
            $username = $user->name; 
            return view('pages.guru.home', compact('username'));
        }
    }
}

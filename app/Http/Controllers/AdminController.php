<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index () {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role_id != 1) {
                return ["hello" => "world"];
            }
            $username = $user->name; 
            return view('pages.admin.dashboard', compact('username'));
        } else {
            return redirect('/');
        }
    }
}

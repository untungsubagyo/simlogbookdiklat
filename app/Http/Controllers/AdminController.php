<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct() {
        // if (!Auth::check()) {
        //     redirect('/login');
        // }
    }

    public function index () {
        // $user = Auth::user();
        // $role = $user->role_id == 1 ? 'admin' : 'user';

        return view('pages.admin.dashboard');
    }
}

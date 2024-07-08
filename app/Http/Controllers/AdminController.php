<?php

namespace App\Http\Controllers;

use App\Models\Diklat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
	public function index()
	{
		if (Auth::check()) {
			$user = Auth::user();
			if ($user->role_id == 2) {
				return redirect('/guru');
			} elseif ($user->role_id != 1) {
				return redirect('/');
			}
			$username = $user->name;
			$dataDiklat = Diklat::join('users', 'users.id', '=', 'diklats.id_user')
				->join('gurus', 'gurus.user_id', '=', 'users.id')
				->get(['diklats.id AS id', 'users.name AS name', 'gurus.NIP AS NIP', 'diklats.updated_at AS updated_at', 'diklats.created_at AS created_at']);
			$menu = 'dashboard';
			return view('pages.admin.dashboard', compact('username', 'dataDiklat', 'menu'));
		} else {
			return redirect('/');
		}
	}
}

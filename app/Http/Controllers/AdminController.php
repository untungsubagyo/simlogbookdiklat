<?php

namespace App\Http\Controllers;

use App\Models\Diklat;
use App\Models\guru;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
	public function index()
	{
		if (Auth::check()) {
			$userdata = Auth::user();
			if ($userdata->role_id == 2) {
				return redirect('/guru');
			} elseif ($userdata->role_id != 1) {
				return redirect('/');
			}
			$dataDiklat = Diklat::join('users', 'users.id', '=', 'diklats.id_user')
				->join('gurus', 'gurus.user_id', '=', 'users.id')
				->get(['diklats.id AS id', 'diklats.nama_diklat AS nama_diklat', 'users.name AS username', 'gurus.NIP AS NIP', 'diklats.updated_at AS updated_at', 'diklats.created_at AS created_at']);

			$menu = 'dashboard';
			$guruCounts = guru::get()->count();

			if ($guruCounts != 0 && $dataDiklat->count() != 0) {
				$averageDiklatCount = round($dataDiklat->count() / $guruCounts);
			} else {
				$averageDiklatCount = 0;
			}
				
			// return $dataDiklat;
			return view('pages.admin.dashboard', compact('userdata', 'dataDiklat', 'menu', 'averageDiklatCount', 'guruCounts'));
		} else {
			return redirect('/');
		}
	}
}

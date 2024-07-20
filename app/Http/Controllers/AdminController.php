<?php

namespace App\Http\Controllers;

use App\Models\Diklat;
use App\Models\guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
	public function index(Request $request)
	{
		if (Auth::check()) {
			$userdata = Auth::user();
			if ($userdata->role_id == 2) {
				return redirect('/guru');
			} elseif ($userdata->role_id != 1) {
				return redirect('/');
			}
			$dataDiklat = [];

			if ($request->has('search')) {
				$dataDiklat = Diklat::join('users', 'users.id', '=', 'diklats.id_user')
					->join('gurus', 'gurus.user_id', '=', 'users.id')
					->where('diklats.nama_diklat', 'like', '%' . $request['search'] . '%')
					->orWhere('users.name', 'like', '%' . $request['search'] . '%')
					->paginate($perPage = 10, $columns = ['diklats.id AS id', 'diklats.nama_diklat AS nama_diklat', 'users.name AS username', 'gurus.NIP AS NIP', 'diklats.updated_at AS updated_at', 'diklats.created_at AS created_at']);

				if ($dataDiklat->count() <= 0) {
					$dataDiklat = ["searchNotFound" => true];
				}
			} else {
				$dataDiklat = Diklat::join('users', 'users.id', '=', 'diklats.id_user')
					->join('gurus', 'gurus.user_id', '=', 'users.id')
					->paginate($perPage = 10, $columns = ['diklats.id AS id', 'diklats.nama_diklat AS nama_diklat', 'users.name AS username', 'gurus.NIP AS NIP', 'diklats.updated_at AS updated_at', 'diklats.created_at AS created_at']);
			}

			$menu = 'dashboard';
			$guruCounts = guru::get()->count();
			$diklatCounts = Diklat::count();

			if ($guruCounts != 0 && $diklatCounts != 0) {
				$averageDiklatCount = round($diklatCounts / $guruCounts);
			} else {
				$averageDiklatCount = 0;
			}
				
			// return $dataDiklat;
			return view('pages.admin.dashboard', compact('userdata', 'dataDiklat', 'menu', 'averageDiklatCount', 'guruCounts', 'diklatCounts'));
		} else {
			return redirect('/');
		}
	}

	// public function search_diklat (Request $request) {
	// 	return $request;
	// }
}

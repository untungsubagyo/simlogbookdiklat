<?php

namespace App\Http\Controllers;

use App\Models\Diklat;
use Illuminate\Support\Facades\Auth;


class HomeGuru extends Controller
{
	public function index()
	{
		if (Auth::check()) {
			$userdata = Auth::user();
			$dataDiklat = Diklat::join('jenis_diklats', 'jenis_diklats.id', '=', 'diklats.id_jenis_diklat')
				->join('kategori_kegiatans', 'kategori_kegiatans.id', '=', 'diklats.id_kategori_kegiatan_diklat')
				->get([
					'diklats.*', 
					'jenis_diklats.nama AS nama_jenis_diklat', 
					'jenis_diklats.jenis_diklat AS jenis_diklat', 
					'kategori_kegiatans.name AS kategori_kegiatan', 
				])
				->where('id_user', '=', $userdata->id);

			// return $dataDiklat;
			return view('pages.guru.home', compact('userdata', 'dataDiklat'));
		}

		return redirect('/');
	}
}

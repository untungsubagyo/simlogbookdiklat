<?php

namespace App\Http\Controllers;

use App\Models\Diklat;
use App\Models\jenis_dokumen;
use App\Models\JenisDiklat;
use App\Models\KategoriKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DiklatController extends Controller
{
	public function __construct()
	{
		if (!Auth::check()) {
			redirect('/');
		}
	}
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$userdata = Auth::user();
		$dataDiklat = Diklat::join('jenis_diklats', 'jenis_diklats.id', '=', 'diklats.id_jenis_diklat')
			->join('kategori_kegiatans', 'kategori_kegiatans.id', '=', 'diklats.id_kategori_kegiatan_diklat')
			->where('diklats.id_user', '=', $userdata->id)
			->get([
				'diklats.*',
				'jenis_diklats.nama AS nama_jenis_diklat',
				'jenis_diklats.jenis_diklat AS jenis_diklat',
				'kategori_kegiatans.name AS kategori_kegiatan',
			]);

		return view('pages.guru.home', compact('userdata', 'dataDiklat'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$data_jenisDiklat = JenisDiklat::get();
		$categories = KategoriKegiatan::get();
		$jenis_dokunmen = jenis_dokumen::get();

		return view('pages.guru.manage-diklat.form-add', compact('jenis_dokunmen', 'data_jenisDiklat', 'categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$id_user = Auth::user()->id;
		$raw_data_jenisDiklat = JenisDiklat::get(['id'])->toArray();
		$raw_categories = KategoriKegiatan::get(['id'])->toArray();
		$raw_jenis_dokumen = jenis_dokumen::get(['id'])->toArray();

		$categories = array_map(function ($item) {return $item['id'];}, $raw_categories);
		$data_jenisDiklat = array_map(function ($item) {return $item['id'];}, $raw_data_jenisDiklat);
		$jenis_dokumen = array_map(function ($item) {return $item['id'];}, $raw_jenis_dokumen);


		// return $categories;
		// return $request->all();
		$data = $request->validate([
			"nama_diklat" => ["required", "min:5", "max:50"],
			"penyelenggara" => ["required", "max:21"],
			"tingkatan_diklat" => ["required", Rule::in('Lokal', 'Regional', 'Nasional', 'Internasional')],
			"jumlah_jam" => ["required", "max:11"],
			"no_sertifikat" => ["required", "max:50"],
			"tanggal_sertifikat" => ["required"],
			"tahun_penyelenggara" => ["required", "max:5"],
			"tempat" => ["required"],
			"tanggal_mulai" => ["required"],
			"tanggal_selesai" => ["required"],
			"no_sk_penugasan" => ["required", "max:21"],
			"tanggal_sk_penugasan" => ["required"],
			"id_jenis_diklat" => ["required", Rule::in($data_jenisDiklat)],
			"id_kategori_kegiatan_diklat" => ["required", Rule::in($categories)],
			"file_dokumen" => ["required", "file", "max:20000000"],
			"nama_dokumen" => ["required", "max:100"],
			"link_dokumen" => ["nullable", "max:500"],
			"id_jenis_dokumen" => ["required", Rule::in($jenis_dokumen)],
			"keterangan_dokumen" => ["nullable"],
		]);
		$data['id_user'] = $id_user;

		// Store the file
		$file = $request->file('file_dokumen');
		$extension = $file->getClientOriginalExtension();
		$fileName = bin2hex(random_bytes(10)) . '.' . $extension;
		$file->move('dokumen_diklat', $fileName);

		// Set the file URL
		$data['file_dokumen'] = url('dokumen_diklat/' . $fileName);

		// Create the record
		$diklat = Diklat::create($data);

		return redirect('/guru')->with('success', 'Diklat created successfully.');
	}

	/**
	 * Display the specified resource.
	 */
	public function show($id)
	{
		$userdata = Auth::user();

		if ($userdata->role_id == 1) {
			$dataDiklat = Diklat::join('jenis_diklats', 'jenis_diklats.id', '=', 'diklats.id_jenis_diklat')
				->join('kategori_kegiatans', 'kategori_kegiatans.id', '=', 'diklats.id_kategori_kegiatan_diklat')
				->join('users', 'users.id', '=', 'diklats.id_user')
				->where('diklats.id', '=', $id)
				->get([
					'diklats.*',
					'users.name AS username',
					'jenis_diklats.nama AS nama_jenis_diklat',
					'jenis_diklats.jenis_diklat AS jenis_diklat',
					'kategori_kegiatans.name AS kategori_kegiatan'
				]);
		} else {
			$dataDiklat = Diklat::join('jenis_diklats', 'jenis_diklats.id', '=', 'diklats.id_jenis_diklat')
				->join('kategori_kegiatans', 'kategori_kegiatans.id', '=', 'diklats.id_kategori_kegiatan_diklat')
				->join('users', 'users.id', '=', 'diklats.id_user')
				->where('diklats.id', '=', $id)
				->where('diklats.id_user', '=', $userdata->id)
				->get([
					'diklats.*',
					'users.name AS username',
					'jenis_diklats.nama AS nama_jenis_diklat',
					'jenis_diklats.jenis_diklat AS jenis_diklat',
					'kategori_kegiatans.name AS kategori_kegiatan'
				]);
		}

		// return $dataDiklat;
		if ($userdata->role_id == 2) {
			return view('pages.guru.manage-diklat.view', compact('dataDiklat'));
		}
		return view('pages.admin.view-diklat.index', compact('dataDiklat'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit($id)
	{
		$diklat = Diklat::where('id', '=', $id)->get();
		$data_jenisDiklat = JenisDiklat::get();
		$jenis_dokumen = jenis_dokumen::get();
		$categories = KategoriKegiatan::get();

		return view('pages.guru.manage-diklat.form-edit', compact('diklat', 'data_jenisDiklat', 'categories', 'jenis_dokumen'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, $id)
	{
		$id_user = Auth::user()->id;
		$raw_data_jenisDiklat = JenisDiklat::get(['id'])->toArray();
		$raw_categories = KategoriKegiatan::get(['id'])->toArray();
		$raw_jenis_dokumen = jenis_dokumen::get(['id'])->toArray();

		$categories = array_map(function ($item) {return $item['id'];}, $raw_categories);
		$data_jenisDiklat = array_map(function ($item) {return $item['id'];}, $raw_data_jenisDiklat);
		$jenis_dokumen = array_map(function ($item) {return $item['id'];}, $raw_jenis_dokumen);


		// return $categories;
		// return $request->all();
		$data = $request->validate([
			"nama_diklat" => ["required", "min:5", "max:50"],
			"penyelenggara" => ["required", "max:21"],
			"tingkatan_diklat" => ["required", Rule::in('Local', 'Regional', 'Nasional', 'Internasional')],
			"jumlah_jam" => ["required", "max:11"],
			"no_sertifikat" => ["required", "max:50"],
			"tanggal_sertifikat" => ["required"],
			"tahun_penyelenggara" => ["required", "max:5"],
			"tempat" => ["required"],
			"tanggal_mulai" => ["required"],
			"tanggal_selesai" => ["required"],
			"no_sk_penugasan" => ["required", "max:21"],
			"tanggal_sk_penugasan" => ["required"],
			"id_jenis_diklat" => ["required", Rule::in($data_jenisDiklat)],
			"id_kategori_kegiatan_diklat" => ["required", Rule::in($categories)],
			"file_dokumen" => ["required", "file", "max:20000000"],
			"nama_dokumen" => ["required", "max:100"],
			"link_dokumen" => ["nullable", "max:500"],
			"id_jenis_dokumen" => ["required", Rule::in($jenis_dokumen)],
			"keterangan_dokumen" => ["nullable"],
		]);
		$data['id_user'] = $id_user;

		// Check if a new file is uploaded
		if ($request->hasFile('file_dokumen')) {
			// Delete the old file
			$diklat = Diklat::findOrFail($id);
			$oldFile = $diklat->file_dokumen;
			if ($oldFile) {
				$oldFilePath = public_path($oldFile);
				if (file_exists($oldFilePath)) {
					unlink($oldFilePath);
				}
			}

			// Store the new file
			$file = $request->file('file_dokumen');
			$extension = $file->getClientOriginalExtension();
			$fileName = bin2hex(random_bytes(10)) . '.' . $extension;
			$file->move('dokumen_diklat', $fileName);

			// Set the file URL
			$data['file_dokumen'] = url('dokumen_diklat/' . $fileName);
		}

		// Update the record
		$diklat = Diklat::findOrFail($id);
		$diklat->update($data);

		return redirect('/guru')->with('message', 'Data Diklat Berhasil Di Perbarui');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id)
	{
		Diklat::findOrFail($id)->delete();
		return redirect()->back()->with('success', 'Diklat berhasil di hapus.');
	}
}

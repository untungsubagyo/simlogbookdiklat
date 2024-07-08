<?php

namespace App\Http\Controllers;

use App\Models\Diklat;
use App\Models\JenisDiklat;
use App\Models\KategoriKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$data_jenisDiklat = JenisDiklat::get();
		$categories = KategoriKegiatan::get();

		return view('pages.guru.manage-diklat.form-add', compact('data_jenisDiklat', 'categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$id_user = Auth::user()->id;
		$data = $request->all();
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
	public function show(Request $request)
	{
		if (Auth::check()) {
			$userdata = Auth::user();
			if ($userdata->role_id == 2) {
				return redirect('/guru');
			} elseif ($userdata->role_id != 1) {
				return redirect('/');
			}
			$dataDiklat = Diklat::join('jenis_diklats', 'jenis_diklats.id', '<', 'diklats.id_jenis_diklat')
				->join('kategori_kegiatans', 'kategori_kegiatans.id', '=', 'diklats.id_kategori_kegiatan_diklat')
				->join('users', 'users.id', '=', 'diklats.id_user')
			->get([
					'diklats.*',
					'users.name AS username',
					'jenis_diklats.nama AS nama_jenis_diklat',
					'jenis_diklats.jenis_diklat AS jenis_diklat',
					'kategori_kegiatans.name AS kategori_kegiatan'
				])->where('diklats.id', '=', $request->query('id'));

			return $dataDiklat;
			// if ($dataDiklat->count() <= 0) {
			// 	return redirect()->back();
			// }

			return view('pages.admin.view-diklat.index', compact('userdata', 'dataDiklat'));
		} else {
			return redirect('/');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit($id)
	{
		$data = Diklat::get()->where('id_user', '=', $id);
		$data_jenisDiklat = JenisDiklat::get();
		$categories = KategoriKegiatan::get();
		// with('children')->whereNull('parent_id')->get();

		return view('pages.guru.manage-diklat.form-edit', compact('data', 'data_jenisDiklat', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, $id)
	{
		$data = $request->all();

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

		return redirect('/guru')->with('success', 'Diklat updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id)
	{
		$diklat = Diklat::findOrFail($id);
		$diklat->delete();

		return redirect()->back()->with('success', 'Diklat deleted successfully.');
	}
}

<?php

namespace App\Http\Controllers;

use App\Models\golongan;
use App\Models\guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class MyProfileController extends Controller
{
	public function __construct()
	{
		if (!Auth::check()) {
			redirect('/');
		}
	}

	public function index()
	{
		$dataProfile = Auth::user();
		$dataGolongan = golongan::all();
		$dataGuru = [];


		if ($dataProfile->role_id == 2) {
			$dataGuru = guru::join('golongans', 'golongans.id', '=', 'gurus.golongan_id')
				->where('user_id', '=', $dataProfile->id)
				->get(['NIP', 'gurus.golongan_id AS gol_id', 'gurus.id AS id_guru', 'golongans.golongan AS golongan', 'golongans.pangkat AS pangkat']);
		}

		return view('pages.my-profile', compact('dataProfile', 'dataGuru', 'dataGolongan'));
	}

	public function update(Request $request)
	{
		// userdata processing
		$usersData = User::findOrFail(Auth::user()->id);
		$validated_data_user = $request->validate([
			'name' => 'required|string|max:255',
			'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($usersData->id)],
			'password' => 'nullable|string|min:8|confirmed',
			'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'request-del-profile' => 'required'
		]);

		$usersData->name = $validated_data_user['name'];
		$usersData->email = $validated_data_user['email'];
		if ($request->filled('password')) {
			$usersData->password = Hash::make($validated_data_user['password']);
		}
		if ($validated_data_user['request-del-profile'] == 'true') {
			if ($usersData->profile_photo) {
				Storage::disk('public')->delete($usersData->profile_photo);
				$usersData->profile_photo = null;
			}
		}
		if ($request->hasFile('profile_photo')) {
			// Delete old profile photo if exists
			if ($usersData->profile_photo) {
				Storage::disk('public')->delete($usersData->profile_photo);
			}
			$profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
			$usersData->profile_photo = $profilePhotoPath;
		}
		$usersData->save();

		// data guru processing
		if ($usersData->role_id == 2) {
			$validated_data_guru = $request->validate([
				'NIP' => 'required|min:2',
				'golongan_id' => 'required',
			]);
			$guru = Guru::findOrFail($request->idg);
			$guru->update([
				'NIP' => $validated_data_guru['NIP'],
				'golongan_id' => $validated_data_guru['golongan_id'],
				'user_id' => $usersData->id
			]);
		}

		return redirect()->back()->with('message', 'profil berhasil di perbarui');
	}
}

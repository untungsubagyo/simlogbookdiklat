<?php

namespace App\Http\Controllers;

use App\Models\golongan;
use App\Models\guru;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageGuruController extends Controller
{
    public function __construct() {
        if (Auth::check()) {
			$user = Auth::user();
			if ($user->role_id == 2) {
				redirect('/guru');
			} elseif ($user->role_id != 1) {
				redirect('/');
			}
        } else {
            redirect('/');
        }
    }

    public function index(): View
    {
        $menu = 'manage_guru';
        $submenu = 'guru';
        $datas = guru::join('golongans', 'golongan_id', '=', 'golongans.id')->select("NIP", "golongan", "user_id", "gurus.id AS id")->paginate(10);
        // $us = guru::join('users', 'user_id', '=', 'users.id')->select("NIP", "golongan", "user_id", "gurus.id AS id")->paginate(10);
        return view('pages.admin.manage-guru.index', compact('datas', 'menu', 'submenu'));
    }

    public function create()
    {
        $menu = 'data';
        $submenu = 'guru';
        $golongan = golongan::all();
        $user = User::all();
        return view('pages.admin.manage-guru.form', compact('menu','submenu','golongan','user'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'NIP' => 'required',
            'golongan_id' => 'required',
            'user_id' => 'required',
        ]);

        Guru::create($request->all());

        return redirect()->route('manage_guru.index')->with('success', 'Data Guru berhasil disimpan');
    }


    public function edit(string $id)
    {
        $menu = 'data';
        $submenu = 'guru';
        $guru = Guru::findOrFail($id);
        $golongan = Golongan::all(); // Jika diperlukan untuk select option
        $user = User::all(); // Jika diperlukan untuk select option
        return view('pages.admin.manage-guru.form_edit', compact('menu','submenu','guru', 'golongan','user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'NIP' => 'required|min:2',
            'golongan_id' => 'required',
            'user_id' => 'required',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->update($request->all());

        return redirect()->route('manage_guru.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        $gol = guru::findOrFail($id);
        $gol->delete();
        return redirect()->route('manage_guru.index')->with('success', 'Data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\golongan;
use App\Models\guru;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function index()
    {
        $menu = 'manage_guru';
        $submenu = 'guru';
        // ketika satu tabel yg join
        // $datas = guru::join('golongans', 'golongan_id', '=', 'golongans.id')->select("NIP", "golongan", "user_id", "gurus.id AS id")->paginate(10);
        // ketika lebih dari 1
        $datas = Guru::join('golongans', 'gurus.golongan_id', '=', 'golongans.id')
        ->join('users', 'gurus.user_id', '=', 'users.id')
        ->select('gurus.NIP', 'golongans.golongan','golongans.pangkat','gurus.name_guru','users.email', 'gurus.id AS id')
        ->get();
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
        // $request->validate([
        //     'NIP' => 'required',
        //     'golongan_id' => 'required',
        //     'user_id' => 'required',
        // ]);

        // Guru::create($request->all());

        // Validasi input
        $request->validate([
            'NIP' => 'nullable|string|max:255|unique:gurus,NIP',
            'name' => 'required|string|max:255',
            'golongan_id' => 'required|exists:golongans,id',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Buat data guru baru
        Guru::create([
            'NIP' => $request->NIP,
            'name_guru' => $request->name,
            'user_id' => $user->id,
            'golongan_id' => $request->golongan_id,
        ]);
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
            'NIP' => 'nullable',
            'name_guru' => 'required|min:2',
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

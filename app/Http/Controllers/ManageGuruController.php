<?php

namespace App\Http\Controllers;

use App\Models\golongan;
use App\Models\guru;
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
        $menu = 'data';
        $submenu = 'guru';
        $datas = guru::join('golongans', 'golongan_id', '=', 'golongans.id')->select("NIP", "golongan", "user_id", "gurus.id AS id")->paginate(10);
        return view('pages.admin.manage-guru.index', compact('datas', 'menu', 'submenu'));
    }

    public function create()
    {
        $golongan = golongan::all();
        return view('pages.admin.manage-guru.form', compact('golongan'));
    }


    public function store(Request $request)
    {
        $request->validate([
            // 'id' => 'required',
            'NIP' => 'required',
            'golongan_id' => 'required',
            'user_id' => 'required',
        ]);

        Guru::create($request->all());

        return redirect()->route('manage-guru.index')->with('success', 'Data guru berhasil disimpan');
    }


    public function edit(string $id)
    {
        $guru = Guru::findOrFail($id);
        $golongan = Golongan::all(); // Jika diperlukan untuk select option
        return view('pages.admin.manage-guru.form_edit', compact('guru', 'golongan'));
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

        return redirect()->route('manage-guru.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        $gol = guru::findOrFail($id);
        $gol->delete();
        return redirect()->route('manage-guru.index')->with('success', 'Data berhasil dihapus');
    }
}

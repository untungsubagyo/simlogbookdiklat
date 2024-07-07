<?php

namespace App\Http\Controllers;

use App\Models\golongan;
use App\Models\guru;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function __construct()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
    }

    public function index()
    {
        $menu = 'data';
        $submenu = 'guru';
        $datas = guru::join('golongans', 'golongan_id', '=', 'golongans.id')->select("NIP", "golongan", "user_id", "gurus.id AS id")->paginate(10);
        return view('pages.admin.guru.index', compact('datas', 'menu', 'submenu'));
    }

    public function create()
    {
        $menu = 'data';
        $submenu = 'guru';
        $golongan = golongan::all();
        return view('pages.admin.guru.form', compact('menu', 'submenu', 'golongan'));
    }


    public function store(Request $request)
    {
        $request->validate([
            // 'id' => 'required',
            'NIP' => 'required',
            'golongan_id' => 'required',
            'user_id' => 'required',
        ]);

        guru::create($request->all());

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil disimpan');
    }


    public function edit(string $id)
    {
        // $menu = 'data';
        // $submenu = 'guru';
        // $guru = guru::find($id);
        // return view('pages.admin.guru.form_edit', compact('guru', 'menu', 'submenu'));
        $guru = Guru::findOrFail($id);
        $golongan = Golongan::all(); // Jika diperlukan untuk select option
        return view('pages.admin.guru.form_edit', compact('guru', 'golongan'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'NIP' => 'required|min:2',
            'golongan_id' => 'required',
            'user_id' => 'required|min:2',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->update($request->all());

        return redirect()->route('guru.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        $guru = guru::findOrFail($id);
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Data berhasil dihapus');
    }
}

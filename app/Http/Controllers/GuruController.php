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
        return redirect('login');
      }
    }

    public function index(): View
    {
        $menu = 'data';
        $submenu = 'guru';
        $datas = guru::latest()->paginate(10);
        return view('pages.admin.guru.index', compact('datas', 'menu', 'submenu'));
    }

    public function create()
    {
    $golongan = golongan::all();
    return view('guru.create', compact('golongan'));
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

    return redirect()->route('guru.index')->with('success', 'Data guru berhasil disimpan');
}


    public function edit(string $id)
    {
        $menu = 'data';
        $submenu = 'guru';
        $guru = guru::find($id);
        return view('pages.admin.guru.form_edit', compact('guru', 'menu', 'submenu'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'golongan' => 'required|min:3|max:5',
            'pangkat' => 'required|min:5',
        ]);

        $gol = guru::findOrFail($id);
        $gol->update([
            'golongan' => $request->golongan,
            'pangkat' => $request->pangkat,
        ]);

        return redirect()->route('guru.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        $gol = guru::findOrFail($id);
        $gol->delete();
        return redirect()->route('guru.index')->with('success', 'Data berhasil dihapus');
    }
}

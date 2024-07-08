<?php

namespace App\Http\Controllers;

use App\Models\golongan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GolonganController extends Controller
{
    public function __construct()
    {
        if (!Auth::check()) {
            redirect('login');
        }
    }

    public function index(): View
    {

        $menu = 'golongan';
        $submenu = 'golongan';
        $datas = golongan::latest()->paginate(10);
        return view('pages.admin.golongan_guru.index', compact('datas', 'menu', 'submenu'));
    }

    public function create()
    {
        $menu = 'data';
        $submenu = 'golongan';
        return view('pages.admin.golongan_guru.form', compact('menu', 'submenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'golongan' => 'required|min:3|max:5',
            'pangkat' => 'required|min:2',
        ]);

        golongan::create([
            'golongan' => $request->golongan,
            'pangkat' => $request->pangkat,
        ]);

        return redirect()->route('golongan_guru.index')->with('success', 'Data Golongan berhasil disimpan');
    }

    public function edit(string $id)
    {
        $menu = 'data';
        $submenu = 'golongan';
        $golongan = golongan::find($id);
        return view('pages.admin.golongan_guru.form_edit', compact('golongan', 'menu', 'submenu'));
    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'golongan' => 'required|min:3|max:5',
            'pangkat' => 'required|min:2',
        ]);
        $gol = golongan::findOrFail($id);
        $gol->update([
            'golongan' => $request->golongan,
            'pangkat' => $request->pangkat,
        ]);

        return redirect()->route('golongan_guru.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        $gol = golongan::findOrFail($id);
        $gol->delete();
        return redirect()->route('golongan_guru.index')->with('success', 'Data berhasil dihapus');
    }
}

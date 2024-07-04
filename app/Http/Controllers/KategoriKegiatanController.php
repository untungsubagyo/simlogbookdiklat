<?php

namespace App\Http\Controllers;

use App\Models\KategoriKegiatan;
use Illuminate\Http\Request;

class KategoriKegiatanController extends Controller
{
    public function index()
    {
        $kategoriKegiatans = KategoriKegiatan::with('parent')->get();
        return view('pages.admin.kategori_kegiatans.index', compact('kategoriKegiatans'));
    }

    public function create()
    {
        $parentCategories = KategoriKegiatan::all();
        return view('pages.admin.kategori_kegiatans.create', compact('parentCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:kategori_kegiatans,id',
        ]);

        KategoriKegiatan::create($request->all());
        return redirect()->route('pages.admin.kategori_kegiatans.index')->with('success', 'Kategori kegiatan created successfully.');
    }
    public function createSubkategori($parent_id)
    {
        $parentCategory = KategoriKegiatan::findOrFail($parent_id);
        return view('pages.admin.kategori_kegiatans.create', compact('parentCategory'));
    }

    public function storeSubkategori(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:kategori_kegiatans,id',
        ]);

        KategoriKegiatan::create($request->all());
        return redirect()->route('pages.admin.kategori_kegiatans.index')->with('success', 'Subkategori kegiatan created successfully.');
    }


    public function show(KategoriKegiatan $kategoriKegiatan)
    {
        return view('pages.admin.kategori_kegiatans.show', compact('kategoriKegiatan'));
    }

    public function edit(KategoriKegiatan $kategoriKegiatan)
    {
        $parentCategories = KategoriKegiatan::all();
        return view('pages.admin.kategori_kegiatans.edit', compact('kategoriKegiatan', 'parentCategories'));
    }

    public function update(Request $request, KategoriKegiatan $kategoriKegiatan)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:kategori_kegiatans,id',
        ]);

        $kategoriKegiatan->update($request->all());
        return redirect()->route('pages.admin.kategori_kegiatans.index')->with('success', 'Kategori kegiatan updated successfully.');
    }

    public function destroy(KategoriKegiatan $kategoriKegiatan)
    {
        $kategoriKegiatan->delete();
        return redirect()->route('pages.admin.kategori_kegiatans.index')->with('success', 'Kategori kegiatan deleted successfully.');
    }
}


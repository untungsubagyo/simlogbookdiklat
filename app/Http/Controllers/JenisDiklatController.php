<?php

namespace App\Http\Controllers;

use App\Models\JenisDiklat;
use Illuminate\Http\Request;

class JenisDiklatController extends Controller
{
    public function index()
    {
        $menu = 'jenis_diklat';
        $submenu = 'JenisDiklat';
        $datas =  JenisDiklat::latest()->paginate(5);
        return view('pages.admin.jenis_diklat.index', compact('menu','submenu','datas'));
    }

    // controller create
    public function create(){
        $menu = 'data';
        $submenu = 'JenisDiklat';
        return view('pages.admin.jenis_diklat.form', compact('menu','submenu'));
    }

    // controller store
    public function store(Request $request){
        $request->validate([
            'nama'=>'required|string|max:50',
            'jenis_diklat' => 'required|in:Pelatihan Profesional,Lemhanas,Diklat Prajabatan,Diklat Kepemimpinan,Academic Exchange',
        ]);
       JenisDiklat::create($request->all());

        return redirect()->route('jenis_diklat.index')->with('success', 'Jenis Diklat berhasil ditambahkan.');
    }

    // controller edit
    function edit($id){
        $menu = 'data';
        $submenu = 'JenisDiklat';
        $jenis_diklat = JenisDiklat::findOrFail($id);
        return view('pages.admin.jenis_diklat.form_edit', compact('jenis_diklat', 'menu', 'submenu'));
    }

    // controller update
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'jenis_diklat' => 'required|in:Pelatihan Profesional,Lemhanas,Diklat Prajabatan,Diklat Kepemimpinan,Academic Exchange',
        ]);

        $jenis_diklat = JenisDiklat::findOrFail($id);
        $jenis_diklat->update($request->all());

        return redirect()->route('jenis_diklat.index')->with('success', 'Jenis Diklat berhasil diperbarui.');
    }

    // controller destroy
    function destroy($id)
    {
        $jenis_diklat = JenisDiklat::findOrFail($id);
        $jenis_diklat->delete();
        return redirect()->route('jenis_diklat.index')->with(['success' => 'Data berhasil dihapus']);
    }

}
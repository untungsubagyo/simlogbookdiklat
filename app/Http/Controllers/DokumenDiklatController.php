<?php

namespace App\Http\Controllers;

use App\Models\dokumen_diklat;
// use App\Models\jenis_dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DokumenDiklatController extends Controller
{
    public function index()
    {
        $menu='data';
        $submenu='dokumen_diklat';
        $datas = dokumen_diklat::latest()->paginate(5);
        return view('pages.admin.dokumen_diklat.index', compact('datas', 'menu', 'submenu'));
    }
    public function store(Request $request)
    {
        $file = $request->file('file');
        $file->storeAs('public/dokumen_d_post', $file->hashName());
        dokumen_diklat::create([
            'file'=>$file->hashName(),
            'nama_dokumen'=>$request->nama_dokumen,
            'keterangan'=>$request->keterangan,
            'jenis_dokumen_id'=>$request->jenis_dokumen_id,
            'link'=>$request->link,
        ]);
        return redirect()->route('dokumen_diklat.index')->with('success', 'Data Diklat berhasil di simpan.');
    }

    public function show($id)
    {
        $menu = 'data';
        $submenu = 'dokumen_diklat';
        $dokumen_diklat = dokumen_diklat::find($id);
        return view('pages.admin.dokumen_diklat.show', compact('dokumen_diklat', 'menu', 'submenu'));
    }
    function edit($id){
        $menu = 'data';
        $submenu = 'dokumen_diklat';
        $dokumen_diklat = dokumen_diklat::find($id);
        return view('pages.admin.dokumen_diklat.form_edit', compact('dokumen_diklat', 'menu', 'submenu'));
    }
    function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|min:5'
        ]);
        $dokumen_diklat = dokumen_diklat::findOrFail($id);
        $dokumen_diklat-> update(['name'=>$request->name]);
        return redirect()->route('dokumen_diklat.index')->with(['success'=>'Data berhasil diubah!']);
    }
    function destroy( $id)
    {
        $dokumen_diklat= dokumen_diklat::findOrFail($id);
        $dokumen_diklat->delete();
        return redirect()->route('dokumen_diklat.index')->with(['success'=> 'Data berhasil di hapus.']);
    }
}

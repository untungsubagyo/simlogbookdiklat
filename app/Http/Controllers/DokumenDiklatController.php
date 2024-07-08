<?php

namespace App\Http\Controllers;

use App\Models\dokumen_diklat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DokumenDiklatController extends Controller
{
    public function index()
    {
        $menu='dokumen_diklat';
        $datas = dokumen_diklat::latest()->paginate(5);
        return view('pages.admin.dokumen_diklat.index', compact('datas', 'menu'));
    }
    public function store(Request $request)
    {
        $file = $request->file('file');
        $file->storeAs('public/pages.dokumen_diklat', $file->hashName());
        dokumen_diklat::create([
            'file'=>$file->hashName(),
            'nama_dokumen'=>$request->nama_dokumen,
            'keterangan'=>$request->keterangan,
        ]);
        return redirect()->route('pages.dokumen_diklat.index')->with('success', 'Data Posts berhasil di simpan.');
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

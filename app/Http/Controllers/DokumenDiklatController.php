<?php

namespace App\Http\Controllers;

use App\Models\dokumen_diklat;
use App\Models\jenis_dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DokumenDiklatController extends Controller
{
    public function index()
    {
        $menu='data';
        $submenu='dokumen_diklat';
        $datas = dokumen_diklat::join('jenis_dokumens', 'jenis_dokumen_id', '=', 'jenis_dokumens.id')->select("file", "nama_dokumen", "keterangan", "jenis_dokumen_id", "link", "dokumen_diklats.id AS id")->paginate(10);
        return view('pages.admin.dokumen_diklat.index', compact('datas', 'menu', 'submenu'));
    }

    public function create()
    {
        $menu = 'data';
        $submenu = 'dokuemn_diklat';
        $jenis_dokumen = jenis_dokumen::all();
        return view('pages.admin.dokumen_diklat.form', compact('menu', 'submenu', 'jenis_dokumen'));
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $file->storeAs('admin/dokumen_diklat', $file->hashName());



        dokumen_diklat::create([
            'file'=>$file->hashName(),
            'nama_dokumen'=>$request->nama_dokumen,
            'keterangan'=>$request->keterangan,
            'jenis_dokumen_id'=>$request->jenis_dokumen_id,
            'link'=>$request->link,
        ]);
        return redirect()->route('pages.dokumen_diklat.index')->with('success', 'Dokumen Diklat berhasil di simpan.');
    }

    // public function show($id)
    // {
    //     $menu = 'data';
    //     $submenu = 'dokumen_diklat';
    //     $dokumen_diklat = dokumen_diklat::find($id);
    //     return view('pages.admin.dokumen_diklat.show', compact('dokumen_diklat', 'menu', 'submenu'));
    // }

    function edit($id){
        $menu = 'data';
        $submenu = 'dokumen_diklat';
        $dokumen_diklat = dokumen_diklat::find($id);
        $jenis_dokumen = jenis_dokumen::all();
        return view('pages.admin.dokumen_diklat.form_edit', compact('menu', 'submenu', 'dokumen_diklat', 'jenis_dokumen'));
    }

    function update(Request $request, string $id)
    {
        $this->validate($request,[
            'jenis_dokumen_id'=>'required'
        ]);
        $dokumen_diklat = dokumen_diklat::findOrFail($id);
        $dokumen_diklat-> update([
            'file'=>$request->file,
            'nama_dokumen'=>$request->nama_dokumen,
            'keterangan'=>$request->keterangan,
            'jenis_dokumen_id'=>$request->jenis_dokumen_id,
            'link'=>$request->link,
        ]);
        
        return redirect()->route('dokumen_diklat.index')->with(['success'=>'Data berhasil diubah!']);
    }
    function destroy(string $id)
    {
        $dokumen_diklat= dokumen_diklat::findOrFail($id);
        $dokumen_diklat->delete();
        return redirect()->route('dokumen_diklat.index')->with(['success'=> 'Data berhasil di hapus.']);
    }
}

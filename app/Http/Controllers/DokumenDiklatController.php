<?php

namespace App\Http\Controllers;

use App\Models\dokumen_diklat;
use App\Models\jenis_dokumen;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DokumenDiklatController extends Controller
{
    public function index(): View
    {

        
        $menu='data';
        $submenu='dokumen_diklat';
        $datas = dokumen_diklat::join('jenis_dokumens', 'jenis_dokumen_id', '=', 'jenis_dokumens.id')->select("file", "nama_dokumen", "keterangan", "jenis_dokumen_id", "link", "dokumen_diklats.id AS id")->paginate(10);
        return view('pages.admin.dokumen_diklat.index', compact('datas', 'menu', 'submenu'));
    }

    public function create()
    {
        $menu = 'data';
        $submenu = 'dokumen_diklat';
        $jenis_dokumen = jenis_dokumen::all();
        return view('pages.admin.dokumen_diklat.form', compact('menu', 'submenu', 'jenis_dokumen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'nama_dokumen' => 'required',
            'keterangan' => 'required',
            'jenis_dokumen_id' => 'required',
            'link' => 'required',
        ]);

        $file = $request->file('file');
        $request->file('file')->storeAs('/dokument', $file->hashName() . $file->getClientOriginalExtension());



        dokumen_diklat::create([
            'file'=>$file->hashName(),
            'nama_dokumen'=>$request->nama_dokumen,
            'keterangan'=>$request->keterangan,
            'jenis_dokumen_id'=>$request->jenis_dokumen_id,
            'link'=>$request->link,
        ]);
        return redirect()->route('dokumen_diklat.index')->with('success', 'Dokumen Diklat berhasil di simpan.');
    }

    // public function show($id)
    // {
    //     $menu = 'data';
    //     $submenu = 'dokumen_diklat';
    //     $dokumen_diklat = dokumen_diklat::find($id);
    //     return view('pages.admin.dokumen_diklat.show', compact('dokumen_diklat', 'menu', 'submenu'));
    // }

    function edit(string $id){
        $menu = 'data';
        $submenu = 'dokumen_diklat';
        $dokumen_diklat = dokumen_diklat::findOrFail($id);
        $jenis_dokumen = jenis_dokumen::all();//select option
        return view('pages.admin.dokumen_diklat.form_edit', compact('menu', 'submenu', 'dokumen_diklat', 'jenis_dokumen'));
    }

    function update(Request $request, string $id)
    {
        $request->validate([
            'file'=>'required',
            'nama_dokumen'=>'required',
            'keterangan'=>'required',
            'jenis_dokumen_id'=>'required',
            'link'=>'required',
        ]);

        $file = $request->file('file');
        $request->file('file')->storeAs('/dokument', $file->hashName() . $file->getClientOriginalExtension());
        

        $datas = dokumen_diklat::findOrFail($id);
        $datas-> update($request->all());
        
        return redirect()->route('admin/dokumen_diklat')->with(['success'=>'Data berhasil diubah!']);
    }
    function destroy(string $id)
    {
        $jdokumen= dokumen_diklat::findOrFail($id);
        $jdokumen->delete();
        return redirect()->route('dokumen_diklat.index')->with(['success'=> 'Data berhasil di hapus.']);
    }
}

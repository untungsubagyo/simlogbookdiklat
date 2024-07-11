<?php

namespace App\Http\Controllers;

use App\Models\jenis_dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\View\View;

class JenisDokumenController extends Controller
{
    public function __construct()
    {
        if (!Auth::check()){
            return redirect('login');
        }
    }

    public function index(): View
    {
        $menu = 'jenis_dokumen';
        $submenu = 'jenis_dokumen';
        $datas = jenis_dokumen::latest()->paginate(5);
        return view('pages.admin.jenis_dokumen.index', compact('datas', 'menu', 'submenu'));
    }
    public function create(){
        $menu = 'data';
        $submenu = 'jenis_dokumen';
        return view('pages.admin.jenis_dokumen.form', compact('menu', 'submenu'));
    }
    function store(Request $request){
        $post = new jenis_dokumen();
        $post->name=$request->name;
        $post->save();
        Session::flash('success', 'Data berhasil disimpan.');
        return redirect('admin/jenis_dokumen');
    }
    function show($id){
        $menu = 'data';
        $submenu = 'jenis_dokumen';
        $jenis_dokumen = jenis_dokumen::find($id);
        return view('pages.admin.jenis_dokumen.show', compact('jenis_dokumen', 'menu', 'submenu'));
    }
    function edit($id){
        $menu = 'data';
        $submenu = 'jenis_dokumen';
        $jenis_dokumen = jenis_dokumen::find($id);
        return view('pages.admin.jenis_dokumen.form_edit', compact('jenis_dokumen', 'menu', 'submenu'));
    }

    function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|min:2'
        ]);
        $jenis_dokumen = jenis_dokumen::findOrFail($id);
        $jenis_dokumen-> update(['name'=>$request->name]);
        return redirect()->route('jenis_dokumen.index')->with(['success'=>'Data berhasil diubah!']);
    }

    function destroy( $id)
    {
        $jenis_dokumen= jenis_dokumen::findOrFail($id);
        $jenis_dokumen->delete();
        return redirect()->route('jenis_dokumen.index')->with(['success'=> 'Data berhasil di hapus.']);
    }
}

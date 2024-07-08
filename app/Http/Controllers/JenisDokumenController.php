<?php
namespace App\Http\Controllers;

use App\Models\JenisDokumen; // Correctly import the model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class JenisDokumenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menu = 'data';
        $submenu = 'jenis_dokumen';
        $datas = JenisDokumen::latest()->paginate(5); // Use the correct model
        return view('pages.admin.jenis_dokumen.index', compact('datas', 'menu', 'submenu'));
    }

    public function create()
    {
        $menu = 'data';
        $submenu = 'jenis_dokumen';
        return view('pages.admin.jenis_dokumen.form', compact('menu', 'submenu'));
    }

    public function store(Request $request)
    {
        $post = new JenisDokumen(); // Use the correct model
        $post->name = $request->name;
        $post->save();
        Session::flash('success', 'Data berhasil disimpan.');
        return redirect('admin/jenis_dokumen');
    }

    public function show($id)
    {
        $menu = 'data';
        $submenu = 'jenis_dokumen';
        $jenis_dokumen = JenisDokumen::find($id); // Use the correct model
        return view('pages.admin.jenis_dokumen.show', compact('jenis_dokumen', 'menu', 'submenu'));
    }

    public function edit($id)
    {
        $menu = 'data';
        $submenu = 'jenis_dokumen';
        $jenis_dokumen = JenisDokumen::find($id); // Use the correct model
        return view('pages.admin.jenis_dokumen.form_edit', compact('jenis_dokumen', 'menu', 'submenu'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:5'
        ]);
        $jenis_dokumen = JenisDokumen::findOrFail($id); // Use the correct model
        $jenis_dokumen->update(['name' => $request->name]);
        return redirect()->route('jenis_dokumen.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        $jenis_dokumen = JenisDokumen::findOrFail($id); // Use the correct model
        $jenis_dokumen->delete();
        return redirect()->route('jenis_dokumen.index')->with('success', 'Data berhasil dihapus.');
    }
}

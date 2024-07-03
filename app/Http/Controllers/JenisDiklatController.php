<?php

namespace App\Http\Controllers;

use App\Models\JenisDiklat;
use Illuminate\Http\Request;

class JenisDiklatController extends Controller
{
      public function index()
    {
        $jenisDiklats = JenisDiklat::all();
        return view('pages.admin.jenis_diklat.index', compact('jenisDiklats'));
    }
    public function create(){
        $jenisDiklats = JenisDiklat::all();
        return view('pages.admin.jenis_diklat.form', compact('jenisDiklats'));
    }
}
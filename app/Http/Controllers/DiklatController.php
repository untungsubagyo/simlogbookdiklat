<?php

namespace App\Http\Controllers;

use App\Models\Diklat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiklatController extends Controller
{
    public function __construct() {
        if (!Auth::check()) {
            redirect('/');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.diklat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Diklat $diklat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diklat $diklat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diklat $diklat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diklat $diklat)
    {
        //
    }
}

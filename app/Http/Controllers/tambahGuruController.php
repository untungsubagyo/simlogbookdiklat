<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class TambahGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = User::where('role_id', 2)->get();
        return view('pages.admin.gurus.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.gurus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2, // Guru role
        ]);

        return redirect()->route('gurus.index')->with('success', 'Guru created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $guru = User::findOrFail($id);
        return view('pages.admin.gurus.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $guru = User::findOrFail($id);
        return view('pages.admin.gurus.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $guru = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($guru->id)],
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $guru->name = $validated['name'];
        $guru->email = $validated['email'];
        if ($request->filled('password')) {
            $guru->password = Hash::make($validated['password']);
        }
        $guru->save();

        return redirect()->route('gurus.index')->with('success', 'Guru updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = User::findOrFail($id);
        $guru->delete();

        return redirect()->route('gurus.index')->with('success', 'Guru deleted successfully.');
    }
}

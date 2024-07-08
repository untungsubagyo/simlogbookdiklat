<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ManageUsersController extends Controller
{
    public function __construct() {
        if (Auth::check()) {
			$user = Auth::user();
			if ($user->role_id == 2) {
				redirect('/guru');
			} elseif ($user->role_id != 1) {
				redirect('/');
			}
        } else {
            redirect('/');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = 'manage_users';
        $usersData = User::where('role_id', 2)->get();
        return view('pages.admin.manage-users.index', compact('usersData', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.manage-users.create');
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

        return redirect()->route('manage-users.index')->with('success', 'Guru created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usersData = User::findOrFail($id);
        return view('pages.admin.manage-users.show', compact('usersData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usersData = User::findOrFail($id);
        return view('pages.admin.manage-users.edit', compact('usersData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $usersData = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($usersData->id)],
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $usersData->name = $validated['name'];
        $usersData->email = $validated['email'];
        if ($request->filled('password')) {
            $usersData->password = Hash::make($validated['password']);
        }
        $usersData->save();

        return redirect()->route('manage-users.index')->with('success', 'Guru updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usersData = User::findOrFail($id);
        $usersData->delete();

        return redirect()->route('manage-users.index')->with('success', 'Guru deleted successfully.');
    }
}

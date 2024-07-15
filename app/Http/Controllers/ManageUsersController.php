<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

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

    public function index()
    {
        $usersData = User::get();
        $menu = 'manage_users';
        $submenu = 'manage_users';
        return view('pages.admin.manage_users.index', compact('usersData', 'menu', 'submenu'));
    }

    public function create()
    {
        $menu = 'manage_users';
        $submenu = 'manage_users';
        return view('pages.admin.manage_users.create', compact('menu', 'submenu'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $profilePhotoPath = $request->file('profile_photo') ? $request->file('profile_photo')->store('profile_photos', 'public') : null;
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2, // Guru role
            'profile_photo' => $profilePhotoPath,
        ]);
    
        return redirect()->route('manage_users.index')->with('success', 'Guru created successfully.');
    }
    
    public function update(Request $request, $id)
    {
        $usersData = User::findOrFail($id);
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($usersData->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            // Delete old profile photo if exists
            if ($usersData->profile_photo) {
                Storage::disk('public')->delete($usersData->profile_photo);
            }
            $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            $usersData->profile_photo = $profilePhotoPath;
        }

        $usersData->name = $validated['name'];
        $usersData->email = $validated['email'];

        if ($request->filled('password')) {
            $usersData->password = Hash::make($validated['password']);
        }
        $usersData->save();

        return redirect()->route('manage_users.index')->with('success', 'Guru updated successfully.');
    }
    
    public function show($id)
    {
        $usersData = User::findOrFail($id);
        $menu = 'manage_users';
        $submenu = 'manage_users';
        return view('pages.admin.manage_users.show', compact('usersData', 'menu', 'submenu'));
    }

    public function edit($id)
    {
        $usersData = User::findOrFail($id);
        $menu = 'manage_users';
        $submenu = 'manage_users';
        return view('pages.admin.manage_users.edit', compact('usersData', 'menu', 'submenu'));
    }



    public function destroy($id)
    {
        $usersData = User::findOrFail($id);
        if ($usersData->profile_photo) {
            Storage::delete('public/' . $usersData->profile_photo);
        }
        $usersData->delete();

        return redirect()->route('manage_users.index')->with('success', 'Guru deleted successfully.');
    }
}

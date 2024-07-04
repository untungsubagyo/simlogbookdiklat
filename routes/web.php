<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\GuruController;
// use App\Models\golongan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    $user = Auth::user();
    $role = $user->role_id == 1 ? 'admin' : 'user';
    return 'Welcome to your dashboard, ' . $user->name . '! You are logged in as ' . $role . '.';
})->middleware('auth');

// Route::resource('/admin', AdminController::class);
Route::resource('/admin/golongan_guru', GolonganController::class);
Route::resource('/admin/guru', GuruController::class);
Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
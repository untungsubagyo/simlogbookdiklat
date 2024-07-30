<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiklatController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\JenisDiklatController;
use App\Http\Controllers\JenisDokumenController;
use App\Http\Controllers\KategoriKegiatanController;
use App\Http\Controllers\ManageGuruController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\MyProfileController;
use App\Http\Middleware\ProtectedRoute;
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

// General Router
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('postLogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('my_profile', [MyProfileController::class, 'index'])->name('my-profile');
Route::put('my_profile/update', [MyProfileController::class, 'update'])->name('my_profile.update');

// Admin Router
Route::get('admin', [AdminController::class, 'index'])->name('dashboard');
Route::resource('admin/kategori_kegiatan', KategoriKegiatanController::class)->middleware(ProtectedRoute::class);
Route::resource('admin/manage_guru', ManageGuruController::class)->middleware(ProtectedRoute::class);
Route::resource('admin/manage_users', ManageUsersController::class)->middleware(ProtectedRoute::class);
Route::resource('admin/golongan_guru', GolonganController::class)->middleware(ProtectedRoute::class);
Route::resource('admin/jenis_diklat', JenisDiklatController::class)->middleware(ProtectedRoute::class);
Route::resource('admin/jenis_dokumen', JenisDokumenController::class)->middleware(ProtectedRoute::class);

// Guru Router
Route::get('guru', [DiklatController::class, 'index'])->name('homePageGuru');
Route::resource('guru/diklat', DiklatController::class)->middleware('auth');


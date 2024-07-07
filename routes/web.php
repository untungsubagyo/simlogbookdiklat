<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiklatController;
use App\Http\Controllers\DokumenDiklatController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\HomeGuru;
use App\Http\Controllers\JenisDiklatController;
use App\Http\Controllers\KategoriKegiatanController;
use App\Http\Controllers\ManageGuruController;
use App\Http\Controllers\ManageUsersController;
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
Route::post('/login', [AuthController::class, 'login'])->name('postLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Router
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/view_diklat', [DiklatController::class, 'show'])->name('viewDiklatGuru');
Route::resource('/admin/kategori_kegiatan', KategoriKegiatanController::class)->middleware('auth');
Route::resource('/admin/manage_guru', ManageGuruController::class)->middleware('auth');
Route::resource('/admin/manage_users', ManageUsersController::class)->middleware('auth');
Route::resource('/admin/golongan_guru', GolonganController::class)->middleware('auth');
Route::resource('/admin/jenis_diklat', JenisDiklatController::class);
Route:: resource('admin/dokumen_diklat', DokumenDiklatController::class);

// Guru Router
Route::get('/guru', [HomeGuru::class, 'index'])->name('homePageGuru');
Route::resource('/guru/diklat', DiklatController::class)->middleware('auth');

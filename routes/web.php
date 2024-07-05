<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiklatController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JenisDiklatController;
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

//LOGIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//
Route::get('/admin', [AdminController::class, 'index']);

// Route::resource('/admin', AdminController::class);
Route::resource('/admin/golongan_guru', GolonganController::class);
Route::resource('/admin/guru', GuruController::class);
Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
Route::resource('/jenis_diklat', JenisDiklatController::class);
Route::resource('/admin/jenis_diklat', JenisDiklatController::class);

Route::resource('/admin/diklat', DiklatController::class);
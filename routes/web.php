<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriKegiatanController;
use App\Http\Controllers\TambahGuruController;
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
//LOGIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//
Route::get('/admin', [AdminController::class, 'index']);
Route::resource('kategori_kegiatans', KategoriKegiatanController::class);
Route::get('/admin/kategori_kegiatans', [KategoriKegiatanController::class, 'index'])->name('pages.admin.kategori_kegiatans.index');


Route::resource('gurus', TambahGuruController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

//prwaktikum 4
Route::get('level', [LevelController::class, 'index']);


//praktikum 5
// Route::get('/kategori', [KategoriController::class, 'index']);

//praktimum 6
Route::get('/user', [UserController::class, 'index']);



//JS4
Route::get('/user', [UserController::class, 'index'])->name('/user');

Route::get('/user/tambah', [UserController::class, 'tambah'])->name('/user/tambah');

Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan'])->name('/user/tambah_simpan');

Route::get('/user/ubah{id}', [UserController::class, 'ubah'])->name('/user/ubah');

Route::put('/user/ubah_simpan{id}', [UserController::class, 'ubah_simpan'])->name('/user/ubah_simpan');


Route::get('/user/hapus{id}', [UserController::class, 'hapus'])->name('/user/hapus');

// JOBSHEET 5-PRAKTIKUM 2
Route::get('/kategori', [KategoriController::class, 'index']);

Route::get('/kategori/create', [KategoriController::class, 'create']);

Route::post('/kategori', [KategoriController::class, 'store']);

Route::get('/kategori/create', [KategoriController::class, 'create'])->name('create');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

Route::get('/kategori/edit{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/edit_simpan{id}', [KategoriController::class, 'edit_simpan'])->name('kategori.edit_simpan');
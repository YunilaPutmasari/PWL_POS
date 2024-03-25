<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\POSController;
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
// Route::get('/user', [UserController::class, 'index'])->name('/user');

// Route::get('/user/tambah', [UserController::class, 'tambah'])->name('/user/tambah');

// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan'])->name('/user/tambah_simpan');

// Route::get('/user/ubah{id}', [UserController::class, 'ubah'])->name('/user/ubah');

// Route::put('/user/ubah_simpan{id}', [UserController::class, 'ubah_simpan'])->name('/user/ubah_simpan');


Route::get('/user/hapus{id}', [UserController::class, 'hapus'])->name('/user/hapus');

// JOBSHEET 5-PRAKTIKUM 2
Route::get('/kategori', [KategoriController::class, 'index']);


Route::get('/kategori/create', [KategoriController::class, 'create']);

Route::post('/kategori', [KategoriController::class, 'store']);

Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

Route::get('/kategori/edit{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/edit_simpan{id}', [KategoriController::class, 'edit_simpan'])->name('kategori.edit_simpan');

Route::get('/kategori/delete{id}', [KategoriController::class, 'delete'])->name('kategori.delete');


//USER
Route::get('/User', [UserController::class, 'index']);

Route::get('/User/create', [UserController::class, 'create']);

Route::post('/User', [UserController::class, 'store']);

Route::get('/User/create', [UserController::class, 'create'])->name('User.create');
Route::get('/User', [UserController::class, 'index'])->name('user.index');

Route::get('/User/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/User/edit_simpan/{id}', [UserController::class, 'edit_simpan'])->name('user.edit_simpan');

Route::get('/User/delete/{id}', [UserController::class, 'delete'])->name('user.delete');


//Level

Route::get('/Level', [LevelController::class, 'index']);

Route::get('/Level/create', [LevelController::class, 'create']);

Route::post('/Level', [LevelController::class, 'store']);

Route::get('/Level/create', [LevelController::class, 'create'])->name('Level.create');
Route::get('/Level', [LevelController::class, 'index'])->name('level.index');

Route::get('/Level/edit/{id}', [LevelController::class, 'edit'])->name('level.edit');
Route::put('/Level/edit_simpan/{id}', [LevelController::class, 'edit_simpan'])->name('level.edit_simpan');

Route::get('/Level/delete/{id}', [LevelController::class, 'delete'])->name('level.delete');


Route::resource('m_user', POSController::class);
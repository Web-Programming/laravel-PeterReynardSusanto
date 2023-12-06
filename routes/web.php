<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/mahasiswa/insert-elq', [MahasiswaController::class, 'indexElq']);

Route::post('/mahasiswa/store-elq', [MahasiswaController::class, 'insertElq']);

Route::get('/mahasiswa/update-elq', [MahasiswaController::class, 'updateElq']);

Route::get('/mahasiswa/delete-elq', [MahasiswaController::class, 'deleteElq']);

Route::get('/mahasiswa/select-elq', [MahasiswaController::class, 'selectElq']);

Route::get('/prodi/all-join-facade', [ProdiController::class, 'allJoinFacade']);

Route::get('/prodi/all-join-elq', [ProdiController::class, 'aljoinElq']);

Route::get('/mahasiswa/all-join-elq', [MahasiswaController::class, 'allJoinElq']);


Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi.create');

Route::post('prodi/store', [ProdiController::class, 'store'])->name('prodi.store');

Route::get('/prodi', [ProdiController::class,'index'])->name('prodi.index')->middleware('auth');

Route::get('/prodi/{prodi}', [ProdiController::class, 'show'])->name('prodi.show');

Route::get('/prodi/{prodi}/edit', [ProdiController::class, 'edit'])->name('prodi.edit');

Route::patch('/prodi/{prodi}', [ProdiController::class, 'update'])->name('prodi.update');

Route::delete('/prodi/{prodi}', [ProdiController::class, 'destroy'])->name('prodi.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

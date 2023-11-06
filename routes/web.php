<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\KurikulumController;
use App\http\Controllers\ProdiController;
use App\http\Controllers\MahasiswaController;


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

//Buat route ke halaman profil
Route::get("/profil", function () {
    return view('profile');
});

Route::get("/mahasiswa{nama}", function ($nama = "Peter") {
    echo "<h1>Halo Nama Saya $nama</h2>";
});

Route::get("/mahasiswa2{nama?}", function ($nama = "Peter") {
    echo "<h1>Halo Nama Saya $nama</h2>";
});

Route::get("/mahasiswa{nama?}/{pekerjaan?}", function ($nama = "Peter", $pekerjaan = "Mahasiswa") {
    echo "<h1>Halo Nama Saya $nama. Saya adalah $pekerjaan</h2>";
});

//Redirect dan Named Routed
Route::get("/hubungi", function () {

    echo "<h1>Hubungi Kami</h1>";
})->name("call"); //named route

Route::redirect("/contact", '/hubungi');

Route::get("/halo", function () {
    echo "<a href='" . route('call') . "'>" . route('call') . "</a>";
});

route::prefix("/mahasiswa")->group(function () {
    route::get("/jadwal", function () {
        echo "<h1>Jadwal Dosen</h1>";
    });

    route::get("/materi", function () {
        echo "<h1>Materi Perkuliahan!</h1>";
    });
    //dan lain2




});

Route::get('/dosen', function () {
    return view('dosen');
});

Route::get('/fakultas', function () {
    // return view('fakultas.index',["ilkom" => "Fakultas Ilmu Komputer dan Rekayasa"]);
    //return view('fakultas.index', ["fakultas" => ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]]);

    //return view('fakultas.index')->with("fakultas", ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]);

    //$fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
    //return view('fakultas.index', compact('fakultas'));

    $kampus = "Universitas Multi Data Palembang";

    $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];

    return view('fakultas.index', compact('fakultas', 'kampus'));



});
Route::get('/mahasiswa/insert-elq', [MahasiswaController::class, 'insertElq']);
Route::get('/mahasiswa/update-elq', [MahasiswaController::class, 'updateElq']);
Route::get('/mahasiswa/delete-elq', [MahasiswaController::class, 'deleteElq']);
Route::get('/mahasiswa/select-elq', [MahasiswaController::class, 'selectElq']);

Route::get('/prodi/all-join-facade', [ProdiController::class, 'allJoinFacade']);
Route::get('/prodi/all-join-elq', [ProdiController::class, 'allJoinElq']);
Route::get('/mahasiswa/all-join-elq', [MahasiswaController::class, 'allJoinElq']);
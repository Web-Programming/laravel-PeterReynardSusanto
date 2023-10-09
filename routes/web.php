<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Buat route ke halaman profil
Route::get("/profil", function(){
    return view('profile');
});

Route::get("/mahasiswa{nama}",function($nama = "Peter") {
    echo "<h1>Halo Nama Saya $nama</h2>";
});

Route::get("/mahasiswa2{nama?}",function($nama = "Peter") {
    echo "<h1>Halo Nama Saya $nama</h2>";
});

Route::get("/mahasiswa{nama?}/{pekerjaan?}",function($nama = "Peter", $pekerjaan = "Mahasiswa") {
    echo "<h1>Halo Nama Saya $nama. Saya adalah $pekerjaan</h2>";
});

//Redirect dan Named Routed 
Route::get("/hubungi", function(){ 

    echo "<h1>Hubungi Kami</h1>";
})->name("call"); //named route

Route::redirect("/contact", '/hubungi');

Route::get("/halo", function(){
    echo "<a href='". route('call') . "'>" . route('call'). "</a>";
});

route::prefix("/mahasiswa")->group(function(){
    route::get("/jadwal", function(){
        echo "<h1>Jadwal Dosen</h1>";
});

    route::get("/materi", function(){
        echo "<h1>Materi Perkuliahan</h1>";
    });
    //dan lain2
});
<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{

    public function insertElq()
    {
        //Single Assignment
        $mhs = new Mahasiswa();
        $mhs->nama = "Peter Reynard Susanto";
        $mhs->npm = "2226250020";
        $mhs->tempat_lahir = "London";
        $mhs->tanggal_lahir = date("y-m-d"); //Tanggal hari ini
        $mhs->save();
        dump($mhs);

        //Mass Assignment
//         $mhs = Mahasiswa::insert(['nama' => 'Peter Reynard Susanto', 'npm' => '2226250020', 'tempat_lahir' -> 'Jakarta',
//     'tanggal_lahir' => date("Y-m-d")]
// );
// dump($mhs);
    }
    public function updateElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '2226250020')->first();
        $mahasiswa->nama_mahasiswa = 'Peter';
        $mahasiswa->save();
        dump($mahasiswa);
    }
    public function deleteElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '2226250020')->first(); // cari data
        $mahasiswa->delete();
        dump($mahasiswa);
    }
    public function SelectElq()
    {
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswa, 'kampus' => $kampus]);
    }
    public function allJoinElq()
    {
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswas = Mahasiswa::has('prodi')->get();
        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswas, 'kampus' => $kampus]);
    }
}
?>
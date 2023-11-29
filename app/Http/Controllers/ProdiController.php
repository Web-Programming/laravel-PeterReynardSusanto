<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\prodi;

class ProdiController extends Controller
{
    public function index() {
        $prodis = Prodi::all();
        return view('prodi.index')->with('prodis', $prodis);
    }
    public function allJoinFacade() {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select mahasiswas.*,prodis.nama as nama_prodi from prodis, mahasiswas where prodis.id = mahasiswas.prodi_id');
        return view('prodi.index', ['allmahasiswaprodi' => $result, 'kampus' => $kampus]);

    }
    public function allJoinElq() {

        $prodis = prodi::with('mahasiswas')->get();
        foreach ($prodis as $prodi) {
            echo "<h3>[$prodi->nama]</h3>";
            echo "<hr>Mahasiswa: ";
            foreach ($prodi->mahasiswas as $mhs) {
                echo $mhs->nama_mahasiswa .", ";
            }
            echo "<hr>";
        }
    }
    public function create() {
        return view('prodi.create');
    }
    public function store(Request $request)
     {
        //dump($request);
       // echo $request->nama;
       $validateData =$request->validate([
        'nama' => 'required|min:5|max:20',
        'foto' => 'required|file|image|max:5000',
       ]);
       // ambil ekstensi file
       $ext = $request->foto->getClientOriginalExtension();
       // rename nama file
       $nama_file = 'foto-' .time() . "." . $ext;
       $path = $request->foto->storeAs('public', $nama_file);

      $prodi = new prodi();
      $prodi->nama = $validateData['nama'];//simpan nilai input ($validateData['nama]) ke dalam
      $prodi->foto = $nama_file;
      $prodi->save();   //simpan ke dalam tabel prodi

      //return "Data prodi $prodi->nama berhasil disimpan ke database"; // tampilan pesan berhasil
       $request->session()->flash('info', "Data prodi $prodi->nama berhasil disimpan ke database");
       return redirect()->route('prodi.create');


    }
public function show(Prodi $prodi) {
    return view('prodi.show', ['prodi'=> $prodi]);
}
public function edit(Prodi $prodi) {
    return view('prodi.edit', ['prodi'=> $prodi]);
}
public function update(Request $request, Prodi $prodi) {
    // dump($request->all());
    // dump($prodi);
    $validateData = $request->validate([
        'nama' => 'required|min:5|max:20',
        ]);

    Prodi::where('id', $prodi->id)->update($validateData);
    $request->session()->flash('info', "Data prodi $prodi->nama berhasil diubah");
    return redirect()->route('prodi.index');
}
public function destroy(Prodi $prodi) {
    $prodi->delete();
    return redirect()->route('prodi.index')
    ->with('info', "Prodi $prodi->nama berhasil dihapus.");
}

public function __construct() {
    $this->middleware('auth');
    $this->middleware('auth')->except('create');
}

}
//
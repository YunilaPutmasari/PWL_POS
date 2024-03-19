<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use App\DataTables\KategoriDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }
    public function create()
    {
        return view('kategori.create');
    }
    public function store(Request $request)
    {
        KategoriModel::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);
        return redirect('/kategori');
    }
    public function edit($id)
    {
        $kategori = KategoriModel::find($id);
        return view('kategori_edit', ['data' => $kategori]);
    }

    public function edit_simpan($id, Request $request)
    {
        $kategori = KategoriModel::find($id);
        $kategori->kode_kategori = $request->kode_kategori;
        $kategori->nama_kategori = $request->nama_kategori;

        $kategori->save();
        return redirect('/kategori');
    }
}
// public function index()
// {

// $data = [
//     'kategori_kode' => 'SNK',
//     'kategori_nama' => 'Snack/Makanan ringan',
//     'created_at' => now()

// ];

// DB::table('m_kategoris')->insert($data);
// return 'insert data baru berhasil';


// $row = DB::table('m_kategoris')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'camilan']);
// return 'Update data berhasil. Jumlah data yang diupdate : ' . $row . 'baris';

// $row = DB::table('m_kategoris')->where('kategori_kode', 'SNK')->delete();
// return 'delete data berhasil. Jumlah data yang di delete : ' . $row . 'baris';



//----menampilkan data yang ada di table m_kategori-----

//         $data = DB::table('m_kategoris')->get();
//         return view('kategori', ['data' => $data]);


//     }

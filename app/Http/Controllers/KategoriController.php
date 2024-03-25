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
        // $validated = $request->validate([

        //     'kategori_kode' => 'required',
        //     'kategori_nama' => 'required',
        // ]);
        $request->validate([

            'kategori_kode' => 'bail|required|unique:m_kategoris|max:255',
            'kategori_nama' => 'bail|required|max:255',

        ]);

        // Membuat data kategori baru
        KategoriModel::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);

        // Redirect ke halaman kategori setelah berhasil menyimpan
        return redirect('/kategori');
    }


    // $validateData = $request->validate([
    //     'title' => ['required', 'unique:posts', 'max:255'],
    //     'body' => ['required'],
    // ]);
    // $validateData = $request->validateWithBag('post', [
    //     'title' => ['required', 'unique:posts', 'max:255'],
    //     'body' => ['required'],
    // ]);


    public function edit($id)
    {
        $kategori = KategoriModel::find($id);
        return view('kategori.edit', ['kategori' => $kategori]);
    }

    public function edit_simpan($id, Request $request)
    {
        $kategori = KategoriModel::find($id);
        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;

        $kategori->save();
        return redirect('/kategori');
    }

    public function delete($id)
    {
        $kategori = KategoriModel::find($id);
        $kategori->delete();
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

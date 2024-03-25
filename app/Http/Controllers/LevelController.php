<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\LevelDataTable;
use App\Models\LevelModel;

class LevelController extends Controller
{

    public function index(LevelDataTable $dataTable)
    {
        return $dataTable->render('level.index');
    }

    public function create()
    {
        return view('level.create');
    }

    public function store(Request $request)
    {
        LevelModel::create([
            'level_kode' => $request->kodeLevel,
            'level_nama' => $request->namaLevel,
            // Sesuaikan dengan atribut lainnya sesuai kebutuhan dalam model Level
        ]);
        // $request->validate([
        //     'title' => 'bail|required|unique:posts|max:255',
        //     'body' => 'required',

        // ]);

        return redirect('/level');
    }

    public function edit($id)
    {
        $level = LevelModel::find($id);
        return view('level.edit', ['level' => $level]);
    }

    public function edit_simpan($id, Request $request)
    {
        $level = LevelModel::find($id);
        $level->level_kode = $request->kodeLevel;
        $level->level_nama = $request->namaLevel;
        // Sesuaikan dengan atribut lainnya sesuai kebutuhan dalam model Level
        $level->save();

        return redirect('/level');
    }

    public function delete($id)
    {
        $level = LevelModel::find($id);
        $level->delete();

        return redirect('/level');
    }
}

// class LevelController extends Controller
// {
//     public function index()
//     {

//         // DB::insert('insert into m_levels(level_kode,level_nama,created_at) values(?,?,?)', ['CUS', 'pelanggan', now()]);
//         // return 'insert data baru berhasil';

//         // $row = DB::update('update m_levels set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
//         // return 'Update data berhasil. Jumlah data yang di update: ' . $row . 'baris';

//         // $row = DB::delete('delete from m_levels where level_kode = ?', ['CUS']);
//         // return 'Delete data berhasil. Jumlah data yang dihapus : ' . $row . 'baris';

//         // $data = DB::Select('SELECT * FROM m_levels');
//         // return view('level', ['data' => $data]);


//     }
// }


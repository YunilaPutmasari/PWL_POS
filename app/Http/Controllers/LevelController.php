<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LevelController extends Controller
{
    public function index()
    {

        DB::insert('insert into m_levels(level_kode,level_nama,created_at) values(?,?,?)', ['CUS', 'pelanggan', now()]);
        return 'insert data baru berhasil';

        // $row = DB::update('update m_levels set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // return 'Update data berhasil. Jumlah data yang di update: ' . $row . 'baris';

        // $row = DB::delete('delete from m_levels where level_kode = ?', ['CUS']);
        // return 'Delete data berhasil. Jumlah data yang dihapus : ' . $row . 'baris';

        // $data = DB::Select('SELECT * FROM m_levels');
        // return view('level', ['data' => $data]);


    }
}

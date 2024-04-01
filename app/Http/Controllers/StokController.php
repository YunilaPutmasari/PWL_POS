<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\StokModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StokController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Stok',
            'list' => ['Home', 'Stok']
        ];

        $page = (object) [
            'title' => 'Daftar Stok yang terdaftar dalam sistem'
        ];

        $activeMenu = 'stok'; //set menu yang sedang aktif
        $stok = StokModel::all(); //UNTUK FILTERING
        return view('stok.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'stok' => $stok,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $stok = BarangModel::select('stok_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah');

        //Filter data user berdasarkan stk_id
        if ($request->stok_id) {
            $stok->where('stok_id', $request->stok_id);
        }
        return DataTables::of($stok)
            ->addIndexColumn()  //menambahkan kolom index/ no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($stok) {
                $btn = '<a href="' . url('/stok/' . $stok->stok_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/stok/' . $stok->stok_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/stok/' . $stok->stok_id) . '">' . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) //memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }



}

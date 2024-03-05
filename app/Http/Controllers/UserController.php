<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        $data = [
            'level_id' => 2,
            'username' => 'Manager_tiga',
            'nama' => 'Manager 3',
            'password' => Hash::make('12345'),
        ];
        UserModel::create($data);

        $user = UserModel::all(); //ambil semua data dar atbel m_users
        return view('user', ['data' => $user]);


        // //coba akses model UserModel

        // $user = UserModel::all();//ambil semua data dari tabel m_user
        // return view('user', ['data' => $user]);


        //tambah data user dengan Eloquent Model

        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];

        // UserModel::insert($data); //tambahkan data ke tabel m_users


        //tambah data user dengan Eloquent Model

        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];

        // UserModel::where('username', 'customer-1')->update($data); //update data user


        // //coba akses model UserModel
        // $user = UserModel::all(); //ambil semua data dar atbel m_users
        // return view('user', ['data' => $user]);

    }
}

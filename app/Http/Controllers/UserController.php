<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use App\DataTables\UserDataTable;


class UserController extends Controller
{

    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'bail|required|unique:m_users|max:255',
            'nama' => 'required',
            'password' => 'required',
            'level_id' => 'required',

        ]);
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
            // Sesuaikan dengan atribut lainnya sesuai kebutuhan dalam model Level
        ]);

        return redirect('/user');
    }

    public function edit($id)
    {
        $user = UserModel::find($id);
        return view('user.edit', ['user' => $user]);
    }

    public function edit_simpan($id, Request $request)
    {
        $user = UserModel::find($id);
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->level_id = $request->level_id;
        $user->save();
        return redirect('/user');
    }

    public function delete($id)
    {
        $level = UserModel::find($id);
        $level->delete();

        return redirect('/user');
    }
}


// public function index(UserDataTable $dataTable)
// {
//     return $dataTable->render('user');
// }

// public function create()
// {
//     return view('user_tambah');
// }
// public function tambah_simpan(Request $request)
// {
//     UserModel::create([
//         'username' => $request->username,
//         'nama' => $request->nama,
//         'password' => Hash::make($request->password),
//         'level_id' => $request->level_id,
//     ]);
//     return redirect('/user');
// }
// public function ubah($id)
// {
//     $user = UserModel::find($id);
//     return view('user_ubah', ['data' => $user]);
// }

// public function ubah_simpan($id, Request $request)
// {
//     $user = UserModel::find($id);
//     $user->username = $request->username;
//     $user->nama = $request->nama;
//     $user->level_id = $request->level_id;
//     $user->save();
//     return redirect('/user');
// }

// public function hapus($id)
// {
//     $user = UserModel::find($id);
//     $user->delete();
//     return redirect('/user');
// }

// public function index()
// {
//     $user = UserModel::with('level')->get();
//     return view('user', ['data' => $user]);
//     //  dd($user);
// }



// public function index()
// {

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




// --JS4--

// $data = [
//     'level_id' => 2,
//     'username' => 'Manager_tiga',
//     'nama' => 'Manager 3',
//     'password' => Hash::make('12345'),
// ];
// UserModel::create($data);

// $user = UserModel::all(); //ambil semua data dar atbel m_users
// return view('user', ['data' => $user]);


//---------------------------------------------------------------------------------

// $user = UserModel::find(1);
// return view('user', ['data' => $user]);

//---------------------------------------------------------------------------------

// $user = UserModel::where('level_id', 1)->first();
// return view('user', ['data' => $user]);

//---------------------------------------------------------------------------------


// $user = UserModel::firstWhere('level_id', 1);
// return view('user', ['data' => $user]);
//---------------------------------------------------------------------------------

// $user = UserModel::findOr(1, ['username', 'nama'], function () {
//     abort('404');
// });
// return view('user', ['data' => $user]);
//---------------------------------------------------------------------------------


//         $user = UserModel::findOrFail(1);
// return view('user', ['data' => $user]);
//---------------------------------------------------------------------------------

// $user = UserModel::where('username', 'manager9')->firstOrFail();
// return view('user', ['data' => $user]);
//---------------------------------------------------------------------------------

// $user = UserModel::where('level_id', 2)->count();
// dd($user);
// return view('user', ['data' => $user]);
//---------------------------------------------------------------------------------

// $user = UserModel::firstOrCreate(
//     [
//         'username' => 'manager22',
//         'nama' => 'Manager Dua Dua',
//         'password' => Hash::make('12345'),
//         'level_id' => 2
//     ],
// );
// return view('user', ['data' => $user]);
//---------------------------------------------------------------------------------


// $user = UserModel::firstOrNew(
//     [
//         'username' => 'manager33',
//         'nama' => 'Manager Tiga Tiga',
//         'password' => Hash::make('12345'),
//         'level_id' => 2
//     ],
// );
// $user->save();
// return view('user', ['data' => $user]);
//---------------------------------------------------------------------------------

// $user = UserModel::create(
//     [
//         'username' => 'manager55',
//         'nama' => 'Manager55',
//         'password' => Hash::make('12345'),
//         'level_id' => 2
//     ]
// );
// $user->username = 'manager56';

// $user->isDirty(); //true
// $user->isDirty('username'); //true
// $user->isDirty('nama'); //false
// $user->isDirty('nama', 'username'); //true

// $user->isClean(); //false
// $user->isClean('username'); //false
// $user->isClean('nama'); //true
// $user->isClean('nama', 'username'); //false

// $user->save();

// $user->isDirty(); //true
// $user->isClean(); //false
// dd($user->isDirty());


//---------------------------------------------------------------------------------

// $user = UserModel::create(
//     [
//         'username' => 'manager11',
//         'nama' => 'Manager11',
//         'password' => Hash::make('12345'),
//         'level_id' => 2
//     ]
// );
// $user->username = 'manager12';
// $user->save();

// $user->wasChanged(); //true
// $user->wasChanged('username'); //true
// $user->wasChanged('username', 'level_id'); //true
// $user->wasChanged('nama'); //false


// $user->wasChanged(); //true
// dd($user->wasChanged('nama', 'username')); //true
//---------------------------------------------------------------------------------

//     $user = UserModel::all();
//     return view('user', ['data' => $user]);


// }


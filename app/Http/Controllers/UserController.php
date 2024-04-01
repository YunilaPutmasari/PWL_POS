<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;


class UserController extends Controller
{

    // Ambil data user dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')->with('level');
        return DataTables::of($users)
            ->addIndexColumn()  //menambahkan kolom index/ no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($user) {
                $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">' . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) //memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }
    //menampilkan detail user

    public function show(string $id)
    {
        $user = UserModel::with('level')->find($id);
        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail user'
        ];

        $activeMenu = 'user'; //set menu yangs edang aktif

        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function index(
    ) {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list' => ['Home', 'user']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user';  //set menu yang sedang aktiv

        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    // public function index(UserDataTable $dataTable)
    // {
    //     return $dataTable->render('user.index');
    // }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'tambah user',
            'list' => ['Home', 'user', 'tambah']
        ];
        $page = (object) [
            'title' => 'tambah user baru'
        ];

        $level = levelModel::all();      //ambil data level untuk ditampilkan di form
        $activeMenu = 'user';//set menu yang sedang aktif
        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            //username harus diisi, berupa string, inimal 3 karakter, dan bernilai unik ditabel m_user kolom username
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100',//nama harus diidi, berupa String, dan maksimal 100 karakter
            'password' => 'required|min:5',//password harus diidi dan minimal 5 karakter
            'level_id' => 'required|integer',//level_id harus diisi dan berupa angka

        ]);
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password), //password di enkripsi sebelum disimpan
            'level_id' => $request->level_id,
            // Sesuaikan dengan atribut lainnya sesuai kebutuhan dalam model Level
        ]);

        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }

    public function edit(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit user'

        ];

        $activeMenu = 'user'; ///set menu yang aktif
        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    //Menampilkan halaman form edit user


    //Menyimpan perubahan data user
    public function update(Request $request, string $id)
    {
        $request->validate([
            //username harus didisi, berupa string, minimal 3 karakter,
            //dan bernilai unik ditabel m_users kolom user kecuali untuk user dengan id yang sedang diedit
            'username' => 'required|string|min:3|unique:m_users,username, ' . $id . ',user_id',
            'nama' => 'required|string|max:100',
            'password' => 'nullable|min:5',
            'level_id' => 'required|integer'
        ]);

        UserModel::find($id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }

    //Menghapus data user
    public function destroy(string $id)
    {
        $check = UserModel::find($id);
        if (!$check) {      //untuk mengecek apakah data user dengan id yang dimaksud ada atau tidak
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }

        try {
            UserModel::destroy($id);    //Hapus data level

            return redirect('/user')->with('seccess', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            //Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkai dengan data ini');
        }
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


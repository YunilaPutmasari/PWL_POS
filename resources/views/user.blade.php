

@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'User')
@section('content_header_title', 'Home')
@section('content_header_subtitle','User' )

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage User</div>
           <div class="card-body">
               <a href="{{ route('create') }}" class="btn btn-primary">+ Tambah User Baru</a>
           </div>
            <div class="card-body">
                
                {{ $dataTable->table() }}

            </div>
        </div>
    </div>
    
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush




{{-- <!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
</head>
<body>
    <h1>Data User</h1>
    <a href="{{ route('/user/tambah') }}">+ Tambah User</a>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th>
            <th>Kode Level  </th>
            <th>Nama Level  </th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->user_id }}</td>
            <td>{{ $d->username }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->level_id }}</td>
            <td>{{ $d->level->level_kode}}</td>
            <td>{{ $d->level->level_nama }}</td>
            <td>
                <a href={{route('/user/ubah', $d->user_id)}}>Ubah</a> |
                <a href={{route('/user/hapus', $d->user_id)}}>Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html> --}}

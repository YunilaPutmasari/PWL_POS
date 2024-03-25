@extends('adminlte::page')
@section('title', 'User')
@section('content_header')
    <h1>User</h1>
@stop
@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title" style="font-weight: bold;">Edit User</h3>

    </div>
    {{-- <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3>Edit User Baru</h3>
            </div> --}}

            

            <form method="POST" action="{{ route('user.edit_simpan', $user->user_id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" value="{{ $user->username }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ $user->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="level_id">Level ID</label>
                        <input type="text" class="form-control" id="level_id" name="level_id" placeholder="Masukkan Level ID" value="{{ $user->level_id }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection

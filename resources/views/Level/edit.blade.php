@extends('adminlte::page')
@section('title', 'level')
@section('content_header')
    <h1>Level</h1>
@stop
@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title" style="font-weight: bold;">Edit Level</h3>
    </div>

    <form method="POST" action="{{ route('level.edit_simpan', $level->level_id) }}">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="level_id">level Id</label>
                <input type="text" class="form-control" id="level_id" name="level_id" placeholder="Masukkan Level Id" value="{{ $level->level_id }}">
            </div>
            <div class="form-group">
                <label for="level_kode">Level Kode</label>
                <input type="text" class="form-control" id="level_kode" name="level_kode" placeholder="Masukkan level Kode" value="{{ $level->level_kode }}">
            </div>
            <div class="form-group">
                <label for="level_nama">Level Nama</label>
                <input type="text" class="form-control" id="level_nama" name="level_nama" placeholder="Masukkan level Nama" value="{{ $level->level_nama }}">
            </div>
    
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
    </form>
</div>
@endsection

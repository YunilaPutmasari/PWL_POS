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
                <label for="kodeLevel">Level Kode</label>
                <input type="text" class="form-control" id="kodeLevel" name="kodeLevel" placeholder="Masukkan level Kode" value="{{ $level->level_kode }}">
            </div>
            <div class="form-group">
                <label for="namaLevel">Level Nama</label>
                <input type="text" class="form-control" id="namaLevel" name="namaLevel" placeholder="Masukkan level Nama" value="{{ $level->level_nama }}">
            </div>
    
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
    </form>
</div>
@endsection

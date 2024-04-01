@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($level)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('level') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form method="POST" action="{{ url('/level/'.$level->level_id) }}" class="form-horizontal">
                    @csrf
                    {!! method_field('PUT') !!} <!-- tambahkan baris ini untuk proses edit yang butuh method PUT -->
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Level Kode</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="level_kode" name="level_kode" value="{{ old('level_kode', $level->level_kode) }}" required>
                            @error('level_kode')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Level Nama</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="level_nama" name="level_nama" value="{{ old('level_nama', $level->level_nama) }}" required>
                            @error('level_nama')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label"></label>
                        <div class="col-11">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('level') }}">Kembali</a>
                        </div>
                    </div>
                </form>
            @endempty
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush



{{-- @extends('adminlte::page')
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
@endsection --}}
@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Edit kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle','Edit' )

{{--Content body: main Page content--}}

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3>Edit Kategori Baru</h3>
            </div>

            <form method="POST" action="{{ route('kategori.edit_simpan',$kategori->kategori_id) }}">
                {{ csrf_field() }}
                {{method_field('PUT')}}
            <div class="card-body">
                <div class="form-group">
                    <label for="kodeKategori">Kode Kategori</label>
                <input type="text" class="form-control" id="kodeKategori" name="kodeKategori" placeholder="Masukkan kode kategori" value="{{$kategori->kategori_kode}}">
                </div>
                <div class="form-group">
                    <label for="namaKategori">Nama Kategori</label>
                <input type="text" class="form-control" id="namaKategori" name="namaKategori" placeholder="Masukkan Nama Kategori" value="{{$kategori->kategori_nama}}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ubah</button>

            </div>
        </form>
    </div>
</div>      
@endsection


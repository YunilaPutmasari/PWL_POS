@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')

{{-- Content body: main Page content --}}

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3>Buat Kategori Baru</h3>
        </div>

        <form method="post" action="../kategori">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="kodeKategori">Kode Kategori</label>
                    <!-- Memindahkan elemen input ke bawah label -->
                    <input id="kodeKategori"
                     type="text" 
                     name="kategori_kode" 
                     {{-- placeholder="Masukkan Kode Kategori"  --}}
                     class="form-control @error('kategori_kode') is-invalid @enderror">
                    <!-- Menampilkan pesan error di bawah input -->
                    @error('kategori_kode')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="namaKategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="namaKategori" name="namaKategori" placeholder="Masukkan Nama Kategori">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection

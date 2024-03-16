@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle','Create' )

{{--Content body: main Page content--}}

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3>Buat Kategori Baru</h3>
            </div>

            <form method="post" action="../kategori">
            <div class="card-body">
                <div class="form-group">
                    <label for="kodeKategori">Kode Kategori</label>
                <input type="text" class="form-control" id="kodeKategori" name="kodeKategori" placeholder="">
                </div>
                <div class="form-group">
                    <label for="namaKategori">Nama Kategori</label>
                <input type="text" class="form-control" id="namaKategori" name="namaKategori" placeholder="">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>      
@endsection


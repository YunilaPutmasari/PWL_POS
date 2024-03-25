@extends('adminlte::page')
@section('title', 'Level')
@section('content_header')
    <h1>Level</h1>
@stop
@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title" style="font-weight: bold;">Tambah Level</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="post" action="../Level">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    {{-- <div class="form-group">
                        <label for="level_id">Level ID</label>
                        <input type="text" class="form-control" id="level_id" name="level_id" placeholder="Enter Level ID">
                    </div> --}}
                    <div class="form-group">
                        <label for="kodeLevel">Level Kode</label>
                        <input type="text" class="form-control" id="kodeLevel" name="kodeLevel" placeholder="Enter level kode">
                    </div>
                    <div class="form-group">
                        <label for="namaLevel">Level Nama</label>
                        <input type="text" class="form-control" id="namaLevel" name="namaLevel" placeholder="Enter level nama">
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css"> 
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop

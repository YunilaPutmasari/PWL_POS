@extends('adminlte::page')
@section('title', 'User')
@section('content_header')
    <h1>User</h1>
@stop
@section('content')
<div class="card card-warning">
    
    <div class="card-header">
        
        <h3 class="card-title" style="font-weight: bold;">Tambah User</h3>

    </div>
    
    <!-- /.card-header -->
    <div class="card-body">
        <form method="post" action="../User">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="level_id">Level ID</label>
                        <input type="text" class="form-control" id="level_id" name="level_id" placeholder="Enter Level ID">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
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

@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>USER</h1>
@stop
@section('content')
<div class="card card-warning">
    <div class="card-header">
      <h3 class="card-title">Manage User</h3>
    </div>

   
    <!-- /.card-header -->
    <div class="card-body">
      <form>
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" placeholder="Masukkan Username">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="Masukkan Nama">
              <label>Password</label>
              <input type="text" class="form-control" placeholder="Masukkan Password">
            </div>
          </div>
         


    <!-- /.card-body -->
  </div>
<div class="card-body">
<form>
<div class="row">
<div class="col-sm-6">
<!-- text input -->
{{-- <div class="form-group">
<label>Level id</label><input type="text" class="form-control" placeholder="id">
<div> --}}
</div>
<button type = "submit" class ="btn btn-info">Submit </button>
</div>
@stop
@section('css')
{{-- Add here extra stylesheets --}}
 <link rel="stylesheet" href="/css/admin_custom.css"> 
 @stop
@section('js')
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop 



{{-- 


{{-- <body>
    
    <h1>Form Tambah Data user</h1>
    <a href="{{route('/user')}}">Kembali</a>
    <form method="post" action="{{route('/user/tambah_simpan')}}">
    

        {{csrf_field()}}

        <label>Username</label>
        <input type="text" name="username" placeholder="Masukkan Username">
        <br>
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukkan Nama">
        <br>
        <label>Password</label>
        <input type="password" name="Password" placeholder="Masukkan Password">
        <br>
        <label>Level ID</label>
        <input type="number" name="level_id" placeholder="Masukkan ID Level">
        <br><br>
        <input type="submit" class="btn btn-success" value="Simpan">

    </form>
</body> --}}


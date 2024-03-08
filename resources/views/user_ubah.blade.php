<body>
    
    <h1>Form Ubah Data user</h1>
    <a href="{{route('/user')}}">Kembali</a>
    <form method="post" action="{{route('/user/ubah_simpan',$data->user_id)}}">
    

        {{csrf_field()}}
        {{method_field('PUT')}}

        <label>Username</label>
        <input type="text" name="username" placeholder="Masukkan Username" value="{{$data->username}}">
        <br>
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukkan Nama" value="{{$data->nama}}">
        <br>
        <label>Level ID</label>
        <input type="text" name="level_id" placeholder="Masukkan ID Level" value="{{$data->level_id}}">
        <br><br>
        <input type="submit" class="btn btn-success" value="Ubah">

    </form>
</body>
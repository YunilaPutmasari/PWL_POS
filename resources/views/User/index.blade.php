@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('user/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success')}}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-denger">{{ session('error')}}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_user">
        
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Level Pengguna</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            var dataUser = $('#table_user').DataTable({
                serverSide: true,  // serverSide: true, jika ingin menggunakan server side processing
                ajax: {
                    "url": "{{ url('user/list') }}",
                    "dataType": "json",
                    "type": "POST"
                },
                columns: [
                    {
                        data: "DT_RowIndex", // nomor urut dari laravel datatable addIndexColumn()
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "username",
                        className: "",
                        orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                        searchable: true  // searchable: true, jika ingin kolom ini bisa dicari
                    },
                    {
                        data: "nama",
                        className: "",
                        orderable: true, // orderable: true, jika ingin kolom ini bisa diurutkan
                        searchable: true // searchable: true, jika ingin kolom ini bisa dicari
                    },
                    {
                        data: "level.level_nama",
                        className: "",
                        orderable: false, // orderable: true, jika ingin kolom ini bisa diurutkan
                        searchable: false  // searchable: true, jika ingin kolom ini bisa dicari
                    },
                    {
                        data: "aksi",
                        className: "",
                        orderable: false,  // orderable: true, jika ingin kolom ini bisa diurutkan
                        searchable: false // searchable: true, jika ingin kolom ini bisa dicari
                    }
                ]
            });
        });
    </script>
@endpush




{{-- @extends('layouts.app') --}}

{{-- Customize layout sections --}}

{{-- @section('subtitle', 'user')
@section('content_header_title', 'Home')
@section('content_header_subtitle','User' )

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage User</div>
           <div class="card-body">
               <a href="{{ route('User.create') }}" class="btn btn-primary">+ Tambah User Baru</a>
           </div>
            <div class="card-body">
                
                {{ $dataTable->table() }}

            </div>
        </div>
    </div>
    
@endsection --}}

{{-- @push('scripts')
    {{ $dataTable->scripts() }}
@endpush --}}


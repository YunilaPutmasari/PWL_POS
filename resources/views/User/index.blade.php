
@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'user')
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
    
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush


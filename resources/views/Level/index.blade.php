@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'level')
@section('content_header_title', 'Home')
@section('content_header_subtitle','Level' )

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Level</div>
           <div class="card-body">
               <a href="{{ route('Level.create') }}" class="btn btn-primary">+ Tambah Level Baru</a>
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

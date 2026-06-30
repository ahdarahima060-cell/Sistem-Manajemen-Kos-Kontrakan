@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h2>Profil Saya</h2>
                <p class="text-muted">Kelola data akun dan informasi profil Anda.</p>
            </div>
            <a href="{{ route('profil.edit') }}" class="btn btn-primary">Edit Profil</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success w-100" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row gy-3">
                <div class="col-md-4">
                    <h6 class="text-muted">Nama</h6>
                    <p class="mb-0">{{ Auth::user()->name }}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="text-muted">Email</h6>
                    <p class="mb-0">{{ Auth::user()->email }}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="text-muted">Peran</h6>
                    <p class="mb-0">{{ ucfirst(Auth::user()->role) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
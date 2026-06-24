@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h2>Profil Saya</h2>
            <p class="text-muted">Kelola data akun dan informasi profil Anda.</p>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5>Nama</h5>
            <p>{{ Auth::user()->name }}</p>

            <h5>Email</h5>
            <p>{{ Auth::user()->email }}</p>

            <h5>Peran</h5>
            <p>{{ ucfirst(Auth::user()->role) }}</p>
        </div>
    </div>
</div>

@endsection

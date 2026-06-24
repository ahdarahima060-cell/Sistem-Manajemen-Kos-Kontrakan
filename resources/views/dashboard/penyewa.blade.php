@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row mb-4">
        <div class="col-12">
            <h2>Dashboard Penyewa</h2>
            <p class="text-muted">
                Selamat datang, {{ Auth::user()->name }}
            </p>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Kamar Saya</h5>
                    <p class="mb-0">
                        Informasi kamar yang sedang Anda tempati.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Status Pembayaran</h5>
                    <p class="mb-0">
                        Informasi tagihan dan pembayaran sewa.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Kontrak Sewa</h5>
                    <p class="mb-0">
                        Lihat masa berlaku kontrak sewa Anda.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Profil Saya</h5>
                    <p class="mb-0">
                        Kelola data akun dan profil Anda.
                    </p>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
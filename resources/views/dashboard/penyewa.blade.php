@extends('layouts.app')

@section('title', 'Dashboard Penyewa')

@section('content')

<div class="container-fluid">
    <div class="row gy-4 mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="row g-0 align-items-center">
                    <div class="col-md-8 p-4">
                        <h2 class="fw-bold mb-2">Hai, {{ Auth::user()->name }}!</h2>
                        <p class="mb-3 text-secondary">
                            Selamat datang di dashboard penyewa. Silakan kelola kamar, kontrak, dan profil dengan mudah di sini.
                        </p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-primary bg-opacity-10 text-primary">Penyewa</span>
                            <span class="badge bg-secondary bg-opacity-10 text-secondary">Akun Aktif</span>
                        </div>
                    </div>
                    <div class="col-md-4 p-4 text-md-end">
                        <i class="fas fa-home fa-3x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon bg-primary bg-opacity-10 text-primary rounded-circle p-3 me-3">
                            <i class="fas fa-door-open fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 text-uppercase text-muted">Kamar Saya</h6>
                            <h4 class="mb-0">1 Unit</h4>
                        </div>
                    </div>
                    <p class="text-secondary small mb-0">Detail kamar yang Anda tempati dan riwayat fasilitas.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon bg-danger bg-opacity-10 text-danger rounded-circle p-3 me-3">
                            <i class="fas fa-wallet fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 text-uppercase text-muted">Status Pembayaran</h6>
                            <h4 class="mb-0">Lunas</h4>
                        </div>
                    </div>
                    <p class="text-secondary small mb-0">Lihat status tagihan terakhir dan riwayat pembayaran Anda.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon bg-success bg-opacity-10 text-success rounded-circle p-3 me-3">
                            <i class="fas fa-file-contract fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 text-uppercase text-muted">Kontrak Sewa</h6>
                            <h4 class="mb-0">Aktif</h4>
                        </div>
                    </div>
                    <p class="text-secondary small mb-0">Periksa durasi kontrak dan masa berlaku sewa Anda.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon bg-info bg-opacity-10 text-info rounded-circle p-3 me-3">
                            <i class="fas fa-user fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 text-uppercase text-muted">Profil Saya</h6>
                            <h4 class="mb-0">Edit</h4>
                        </div>
                    </div>
                    <p class="text-secondary small mb-0">Perbarui data kontak dan informasi akun Anda kapan saja.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
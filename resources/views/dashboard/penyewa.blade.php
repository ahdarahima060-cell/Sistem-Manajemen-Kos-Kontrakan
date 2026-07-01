@extends('layouts.app')

@section('title', 'Dashboard Penyewa')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card card-soft shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <p class="mb-1 text-muted small">Hai, {{ Auth::user()->name }}! 👋</p>
                            <h2 class="fw-bold mb-2">Selamat datang di dashboard penyewa</h2>
                            <p class="mb-0 text-muted">Kelola status sewa, tagihan, dan informasi kamar Anda dengan mudah.</p>
                        </div>
                        <div class="col-md-4 text-md-end mt-3 mt-md-0">
                            <span class="badge-soft">Penyewa Aktif</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-3 col-md-6">
            <a href="{{ route('kamar.index') }}" class="text-decoration-none text-reset">
                <div class="card card-soft h-100 border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                <p class="text-uppercase text-muted small mb-1">Kamar Saya</p>
                                <h4 class="fw-bold mb-0">{{ $room?->room_code ?? '-' }}</h4>
                                <p class="text-muted small mb-0">{{ $room?->floor ? 'Lantai '.$room->floor : '' }}</p>
                            </div>
                            <div class="rounded-circle bg-pink-soft text-pink p-3">
                                <i class="fas fa-door-open fa-lg"></i>
                            </div>
                        </div>
                        <p class="text-muted small mb-0">Detail kamar dan fasilitas yang Anda gunakan.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="{{ route('kontrak') }}" class="text-decoration-none text-reset">
                <div class="card card-soft h-100 border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                <p class="text-uppercase text-muted small mb-1">Status Sewa</p>
                                <h4 class="fw-bold mb-0">{{ $isActive ? 'Aktif' : ($contract ? 'Tidak Aktif' : 'Belum Ada') }}</h4>
                                <p class="text-muted small mb-0">{{ $contract ? ('Sampai '.( $contractEnd ? 
                                    \Carbon\Carbon::parse($contractEnd)->format('d M Y') : '-')) : '-' }}</p>
                            </div>
                            <div class="rounded-circle bg-success bg-opacity-10 text-success p-3">
                                <i class="fas fa-check-circle fa-lg"></i>
                            </div>
                        </div>
                        <p class="text-muted small mb-0">Periksa durasi kontrak dan masa berlaku sewa Anda.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="{{ route('pembayaran') }}" class="text-decoration-none text-reset">
                <div class="card card-soft h-100 border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                <p class="text-uppercase text-muted small mb-1">Tagihan Bulan Ini</p>
                                <h4 class="fw-bold mb-0">Rp {{ number_format($dueAmount ?? 0, 0, ',', '.') }}</h4>
                                <p class="text-muted small mb-0">Jatuh tempo {{ $dueDate ? \Carbon\Carbon::parse($dueDate)->format('d M Y') : '-' }}</p>
                            </div>
                            <div class="rounded-circle bg-warning bg-opacity-10 text-warning p-3">
                                <i class="fas fa-file-invoice-dollar fa-lg"></i>
                            </div>
                        </div>
                        <p class="text-muted small mb-0">Lihat status tagihan dan riwayat pembayaran.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6">
            <a href="{{ route('profil') }}" class="text-decoration-none text-reset">
                <div class="card card-soft h-100 border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <p class="text-uppercase text-muted small mb-1">Profil Saya</p>
                                <h4 class="fw-bold mb-0">Edit</h4>
                                <p class="text-muted small mb-0">Perbarui data kontak dan akun Anda.</p>
                            </div>
                            <div class="rounded-circle bg-info bg-opacity-10 text-info p-3">
                                <i class="fas fa-user fa-lg"></i>
                            </div>
                        </div>
                        <p class="text-muted small mb-0">Kelola informasi pribadi Anda kapan saja.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-xl-6">
            <div class="card card-soft h-100 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h5 class="fw-bold mb-1">Informasi Sewa</h5>
                                <p class="text-muted small mb-0">Detail kamar yang sedang Anda tempati.</p>
                        </div>
                        <a href="{{ route('kontrak') }}" class="btn btn-pink btn-sm">Lihat Detail</a>
                    </div>
                    <div class="row row-cols-1 row-cols-sm-2 g-3">
                        <div class="col">
                            <div class="p-3 bg-white rounded-4 border">
                                <p class="text-muted small mb-1">Nomor Kamar</p>
                                <h6 class="fw-bold mb-0">{{ $room?->room_code ?? '-' }}</h6>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3 bg-white rounded-4 border">
                                <p class="text-muted small mb-1">Tipe Kamar</p>
                                <h6 class="fw-bold mb-0">{{ $room?->type ?? '-' }}</h6>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3 bg-white rounded-4 border">
                                <p class="text-muted small mb-1">Tanggal Mulai</p>
                                <h6 class="fw-bold mb-0">{{ $contractStart ? \Carbon\Carbon::parse($contractStart)->format('d M Y') : '-' }}</h6>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3 bg-white rounded-4 border">
                                <p class="text-muted small mb-1">Tanggal Selesai</p>
                                <h6 class="fw-bold mb-0">{{ $contractEnd ? \Carbon\Carbon::parse($contractEnd)->format('d M Y') : '-' }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card card-soft h-100 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h5 class="fw-bold mb-1">Tagihan Terbaru</h5>
                            <p class="text-muted small mb-0">Ringkasan pembayaran terbaru Anda.</p>
                        </div>
                        <a href="{{ route('pembayaran') }}" class="btn btn-outline-secondary btn-sm">Lihat Riwayat</a>
                    </div>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="p-3 bg-white rounded-4 border h-100">
                                <p class="text-muted small mb-1">Total Tagihan</p>
                                <h6 class="fw-bold mb-0">Rp 1.200.000</h6>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-white rounded-4 border h-100">
                                <p class="text-muted small mb-1">Dibayar</p>
                                <h6 class="fw-bold mb-0">Rp 1.200.000</h6>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="p-3 bg-success bg-opacity-10 rounded-4 border border-success">
                                <p class="text-success small mb-1">Status Tagihan</p>
                                <h6 class="fw-bold mb-0 text-success">Lunas</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-soft border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h5 class="fw-bold mb-1">Peraturan Kos</h5>
                            <p class="text-muted small mb-0">Pastikan tetap nyaman dan aman selama tinggal.</p>
                        </div>
                        <a href="{{ route('profil') }}" class="btn btn-outline-primary btn-sm">Download Peraturan</a>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 g-3">
                        <div class="col">
                            <div class="p-3 bg-white rounded-4 border">
                                <p class="mb-1 fw-semibold">1. Laporkan kerusakan.</p>
                                <p class="text-muted small mb-0">Hubungi admin jika fasilitas bermasalah.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3 bg-white rounded-4 border">
                                <p class="mb-1 fw-semibold">2. Jaga kebersihan.</p>
                                <p class="text-muted small mb-0">Bersihkan area pribadi secara rutin.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3 bg-white rounded-4 border">
                                <p class="mb-1 fw-semibold">3. Hormati tetangga.</p>
                                <p class="text-muted small mb-0">Jaga ketenangan dan sopan santun.</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3 bg-white rounded-4 border">
                                <p class="mb-1 fw-semibold">4. Dilarang merokok.</p>
                                <p class="text-muted small mb-0">Jangan merokok di dalam kamar atau area tertutup.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

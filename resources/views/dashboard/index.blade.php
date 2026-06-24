@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm overflow-hidden mb-4">
                <div class="row g-0 align-items-center">
                    <div class="col-md-8 p-4">
                        <h2 class="fw-bold mb-2">Dashboard Admin Kos Thursina</h2>
                        <p class="mb-0 text-secondary">Selamat datang Admin. Lihat ringkasan performa kos dan data penyewa di halaman ini.</p>
                    </div>
                    <div class="col-md-4 text-md-end p-4">
                        <div class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10" style="width:72px; height:72px;">
                            <i class="fas fa-chart-line fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-xl-4 col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">Total Kamar</h6>
                            <h3 class="fw-bold mb-0">0</h3>
                        </div>
                        <span class="badge bg-primary bg-opacity-10 text-primary py-2 px-3 rounded-pill"><i class="fas fa-door-open"></i></span>
                    </div>
                    <p class="text-secondary mb-0">Jumlah kamar tersedia dan yang terisi bisa dilihat pada manajemen kamar.</p>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">Total Penyewa</h6>
                            <h3 class="fw-bold mb-0">0</h3>
                        </div>
                        <span class="badge bg-success bg-opacity-10 text-success py-2 px-3 rounded-pill"><i class="fas fa-users"></i></span>
                    </div>
                    <p class="text-secondary mb-0">Hitung penyewa aktif saat ini dan kontrol data kontrak mereka dengan cepat.</p>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">Pendapatan</h6>
                            <h3 class="fw-bold mb-0">Rp 0</h3>
                        </div>
                        <span class="badge bg-warning bg-opacity-10 text-warning py-2 px-3 rounded-pill"><i class="fas fa-wallet"></i></span>
                    </div>
                    <p class="text-secondary mb-0">Lihat total pemasukan dan kelola laporan keuangan kos Anda dengan mudah.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-1">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="mb-0">Ringkasan Aktivitas</h5>
                        <span class="badge bg-secondary bg-opacity-10 text-secondary">Terbaru</span>
                    </div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item px-0 py-3 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">Tidak ada data terbaru</h6>
                                    <p class="small text-secondary mb-0">Aktivitas terbaru penyewa dan kontrak akan muncul di sini.</p>
                                </div>
                                <span class="text-muted small">Sekarang</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="mb-3">Ringkasan Cepat</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center mb-3">
                            <span class="me-3 text-primary"><i class="fas fa-check-circle"></i></span>
                            <div>
                                <strong>Dashboard bersih</strong>
                                <div class="text-secondary small">Penggunaan mudah untuk admin kos.</div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <span class="me-3 text-success"><i class="fas fa-user-check"></i></span>
                            <div>
                                <strong>Data penyewa</strong>
                                <div class="text-secondary small">Semua penyewa dikelola dengan baik.</div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <span class="me-3 text-warning"><i class="fas fa-file-invoice-dollar"></i></span>
                            <div>
                                <strong>Laporan teratur</strong>
                                <div class="text-secondary small">Lihat ringkasan pendapatan setiap bulan.</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
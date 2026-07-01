@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card card-soft">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
                    <div>
                        <span class="badge-soft">Dashboard Admin</span>
                        <h1 class="mt-3 mb-2">Selamat datang kembali, Admin</h1>
                        <p class="text-muted">Ringkasan data kos, penyewa, pembayaran, dan laporan dalam satu tampilan.</p>
                    </div>
                    <div class="text-md-end">
                        <p class="mb-1 text-muted">Jumlah kontrak aktif</p>
                        <h3 class="mb-0 fw-bold">{{ $activeContracts }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-3 col-sm-6">
            <div class="card card-soft h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">Total Kamar</h6>
                            <h2 class="fw-bold mb-0">{{ $totalRooms }}</h2>
                        </div>
                        <span class="badge-soft"><i class="fa fa-door-open"></i></span>
                    </div>
                    <p class="text-muted small mb-0">Kamar tersedia, dipesan, dan dalam perawatan.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-soft h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">Kamar Terisi</h6>
                            <h2 class="fw-bold mb-0">{{ $occupiedRooms }}</h2>
                        </div>
                        <span class="badge-soft"><i class="fa fa-users"></i></span>
                    </div>
                    <p class="text-muted small mb-0">Jumlah kamar yang saat ini sedang ditempati.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-soft h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">Pendapatan</h6>
                            <h2 class="fw-bold mb-0">Rp {{ number_format($totalPaidPayments, 0, ',', '.') }}</h2>
                        </div>
                        <span class="badge-soft"><i class="fa fa-wallet"></i></span>
                    </div>
                    <p class="text-muted small mb-0">Total pembayaran lunas yang terdata.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-soft h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">Pengeluaran Bulan Ini</h6>
                            <h2 class="fw-bold mb-0">Rp {{ number_format($currentMonthExpenses, 0, ',', '.') }}</h2>
                        </div>
                        <span class="badge-soft"><i class="fa fa-receipt"></i></span>
                    </div>
                    <p class="text-muted small mb-0">Total biaya operasional yang tercatat bulan ini.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-xl-8">
            <div class="card card-soft h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h5 class="mb-1">Pendapatan & Aktivitas</h5>
                            <p class="text-muted small mb-0">Visualisasi ringkasan transaksi dan kontrak terbaru.</p>
                        </div>
                        <span class="badge-soft">Terbaru</span>
                    </div>
                    <div class="chart-line"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card card-soft h-100">
                <div class="card-body">
                    <h5 class="mb-3">Ringkasan Cepat</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-start mb-3">
                            <span class="me-3 mt-1 text-pink"><i class="fa fa-check-circle"></i></span>
                            <div>
                                <strong>Total kontrak</strong>
                                <div class="text-muted small">{{ $totalContracts }} kontrak aktif dan selesai.</div>
                            </div>
                        </li>
                        <li class="d-flex align-items-start mb-3">
                            <span class="me-3 mt-1 text-pink"><i class="fa fa-bell"></i></span>
                            <div>
                                <strong>Pengingat</strong>
                                <div class="text-muted small">{{ $pendingReminders }} pengingat pembayaran tersisa.</div>
                            </div>
                        </li>
                        <li class="d-flex align-items-start">
                            <span class="me-3 mt-1 text-pink"><i class="fa fa-file-invoice-dollar"></i></span>
                            <div>
                                <strong>Tagihan</strong>
                                <div class="text-muted small">{{ $totalInvoices }} invoice, {{ $paidInvoices }} sudah dibayar.</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card card-soft h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="mb-0">Kamar Ringkas</h5>
                        <small class="text-muted">Status</small>
                    </div>
                    <div class="row text-center">
                        <div class="col-4 border-end">
                            <p class="text-muted small mb-1">Tersedia</p>
                            <h3 class="fw-bold mb-0">{{ $availableRooms }}</h3>
                        </div>
                        <div class="col-4 border-end">
                            <p class="text-muted small mb-1">Terisi</p>
                            <h3 class="fw-bold mb-0">{{ $occupiedRooms }}</h3>
                        </div>
                        <div class="col-4">
                            <p class="text-muted small mb-1">Perawatan</p>
                            <h3 class="fw-bold mb-0">{{ $maintenanceRooms }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-soft h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="mb-0">Transaksi Terbaru</h5>
                        <small class="text-muted">{{ $recentPayments->count() }} terbaru</small>
                    </div>
                    <div class="list-group list-group-flush">
                        @forelse($recentPayments as $payment)
                            <div class="list-group-item px-0 py-3 border-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-1 fw-semibold">{{ $payment->contract?->tenant_name ?? 'Penyewa tidak dikenal' }}</p>
                                        <p class="small text-muted mb-0">Rp {{ number_format($payment->amount, 0, ',', '.') }} - {{ $payment->payment_date?->format('d M Y') ?? 'Tanggal kosong' }}</p>
                                    </div>
                                    <span class="badge bg-success bg-opacity-10 text-success">{{ ucfirst($payment->status) }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="list-group-item px-0 py-3 border-0 text-center text-muted">Belum ada transaksi terbaru.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

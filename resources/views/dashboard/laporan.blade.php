@extends('layouts.app')

@section('title', 'Laporan Admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card card-soft">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
                    <div>
                        <span class="badge-soft">Laporan</span>
                        <h1 class="mt-3 mb-2">Ringkasan Laporan Bulanan</h1>
                        <p class="text-muted">Kelola ringkasan pendapatan, pengeluaran, dan target performa kos.</p>
                    </div>
                    <a href="#" class="btn btn-pink btn-sm">Export PDF</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card card-soft h-100">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted mb-2">Total Pendapatan</h6>
                    <h2 class="fw-bold">Rp {{ number_format($totalPaidPayments, 0, ',', '.') }}</h2>
                    <p class="text-muted small mb-0">Semua pembayaran lunas yang tercatat.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-soft h-100">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted mb-2">Total Pengeluaran</h6>
                    <h2 class="fw-bold">Rp {{ number_format($currentMonthExpenses, 0, ',', '.') }}</h2>
                    <p class="text-muted small mb-0">Pengeluaran operasional bulan ini.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-soft h-100">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted mb-2">Invoice Tertunda</h6>
                    <h2 class="fw-bold">{{ $unpaidInvoices }}</h2>
                    <p class="text-muted small mb-0">Invoice yang perlu ditindaklanjuti.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-1">
        <div class="col-12">
            <div class="card card-soft">
                <div class="card-body">
                    <h5 class="mb-3">Ringkasan Performa</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="p-4 border rounded-4 bg-white h-100">
                                <p class="text-muted small mb-2">Total Kamar</p>
                                <h3 class="fw-bold mb-0">{{ $totalRooms }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="p-4 border rounded-4 bg-white h-100">
                                <p class="text-muted small mb-2">Kontrak Aktif</p>
                                <h3 class="fw-bold mb-0">{{ $activeContracts }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="p-4 border rounded-4 bg-white h-100">
                                <p class="text-muted small mb-2">Pengingat</p>
                                <h3 class="fw-bold mb-0">{{ $pendingReminders }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

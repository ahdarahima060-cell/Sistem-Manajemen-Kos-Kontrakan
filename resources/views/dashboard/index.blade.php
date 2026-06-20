@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-1">Dashboard Manajemen Kos Thursina</h1>
            <p class="text-muted">Ringkasan operasional kos, kontrak penyewa, tagihan, dan pembayaran.</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted mb-2">Total Kamar</p>
                    <h3 class="mb-0">{{ $totalRooms }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted mb-2">Kamar Tersedia</p>
                    <h3 class="text-success mb-0">{{ $availableRooms }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted mb-2">Kamar Ditempati</p>
                    <h3 class="text-info mb-0">{{ $occupiedRooms }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted mb-2">Kamar Maintenance</p>
                    <h3 class="text-warning mb-0">{{ $maintenanceRooms }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-3">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted mb-2">Kontrak Aktif</p>
                    <h3 class="mb-0">{{ $activeContracts }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted mb-2">Kontrak Kadaluarsa</p>
                    <h3 class="mb-0">{{ $expiredContracts }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted mb-2">Pengingat Terlewat</p>
                    <h3 class="mb-0">{{ $pendingReminders }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-3">
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted mb-2">Pendapatan Terkonfirmasi</p>
                    <h3 class="mb-0">Rp{{ number_format($totalPaidPayments, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted mb-2">Pembayaran Tertunda</p>
                    <h3 class="mb-0 text-danger">Rp{{ number_format($totalUnpaidPayments, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted mb-2">Pengeluaran Bulan Ini</p>
                    <h3 class="mb-0 text-warning">Rp{{ number_format($currentMonthExpenses, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-3">
        <div class="col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">Ringkasan Tagihan</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-4">
                            <h3 class="text-primary">{{ $totalInvoices }}</h3>
                            <p class="text-muted mb-0">Total Faktur</p>
                        </div>
                        <div class="col-4">
                            <h3 class="text-success">{{ $paidInvoices }}</h3>
                            <p class="text-muted mb-0">Lunas</p>
                        </div>
                        <div class="col-4">
                            <h3 class="text-danger">{{ $unpaidInvoices }}</h3>
                            <p class="text-muted mb-0">Belum Lunas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">Statistik Kontrak</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Jumlah Kontrak
                            <span class="badge bg-primary rounded-pill">{{ $totalContracts }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Pembayaran Terverifikasi
                            <span class="badge bg-success rounded-pill">{{ $totalPaidPayments > 0 ? 'Ada' : 'Belum' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Pembayaran Tertunda
                            <span class="badge bg-danger rounded-pill">{{ $totalUnpaidPayments > 0 ? 'Ada' : 'Tidak Ada' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-3">
        <div class="col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">Kontrak Terbaru</h5>
                </div>
                <div class="card-body p-0">
                    @if($recentContracts->isEmpty())
                        <div class="p-3 text-center text-muted">Tidak ada kontrak terbaru.</div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Penyewa</th>
                                        <th>Kamar</th>
                                        <th>Periode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentContracts as $contract)
                                        <tr>
                                            <td>{{ $contract->tenant_name }}</td>
                                            <td>{{ $contract->room->room_code ?? '-' }}</td>
                                            <td>{{ $contract->contract_start->format('d M Y') }} - {{ $contract->contract_end->format('d M Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">Pembayaran Terbaru</h5>
                </div>
                <div class="card-body p-0">
                    @if($recentPayments->isEmpty())
                        <div class="p-3 text-center text-muted">Tidak ada pembayaran terbaru.</div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Penyewa</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentPayments as $payment)
                                        <tr>
                                            <td>{{ $payment->contract->tenant_name ?? '-' }}</td>
                                            <td>Rp{{ number_format($payment->amount, 0, ',', '.') }}</td>
                                            <td>
                                                <span class="badge bg-{{ $payment->status === 'paid' ? 'success' : 'danger' }}">
                                                    {{ $payment->status === 'paid' ? 'Lunas' : 'Belum Lunas' }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

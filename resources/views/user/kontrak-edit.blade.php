@extends('layouts.app')

@section('title', 'Edit Kontrak')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold">Edit Kontrak Penyewa</h2>
            <p class="text-secondary">Perbarui data kontrak penyewa yang sudah terdaftar.</p>
        </div>
        <div class="col text-end">
            <a href="{{ route('kontrak') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <h5 class="mb-2">Perbaiki kesalahan berikut:</h5>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-header bg-pink text-white border-0">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="mb-0">Form Edit Kontrak</h5>
                    <small>Perbarui data kontrak sesuai kebutuhan.</small>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('kontrak.update', $contract->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Pilih Penyewa</label>
                        <select class="form-select" name="user_id" required>
                            <option value="">Pilih penyewa</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $contract->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Pilih Kamar</label>
                        <select class="form-select" name="room_id" required>
                            <option value="">Pilih kamar</option>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}" {{ old('room_id', $contract->room_id) == $room->id ? 'selected' : '' }}>{{ $room->room_code }} - {{ $room->type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nama Penyewa</label>
                        <input type="text" class="form-control" name="tenant_name" value="{{ old('tenant_name', $contract->tenant_name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">No. Identitas</label>
                        <input type="text" class="form-control" name="id_number" value="{{ old('id_number', $contract->id_number) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Telepon</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone', $contract->phone) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kontak Darurat</label>
                        <input type="text" class="form-control" name="emergency_contact" value="{{ old('emergency_contact', $contract->emergency_contact) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Mulai Kontrak</label>
                        <input type="date" class="form-control" name="contract_start" value="{{ old('contract_start', $contract->contract_start) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Selesai Kontrak</label>
                        <input type="date" class="form-control" name="contract_end" value="{{ old('contract_end', $contract->contract_end) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Sewa Per Bulan</label>
                        <input type="number" class="form-control" name="monthly_rent" value="{{ old('monthly_rent', $contract->monthly_rent) }}" step="0.01" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Deposit</label>
                        <input type="number" class="form-control" name="deposit_paid" value="{{ old('deposit_paid', $contract->deposit_paid) }}" step="0.01" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status Pembayaran</label>
                        <select class="form-select" name="payment_status" required>
                            <option value="current" {{ old('payment_status', $contract->payment_status) == 'current' ? 'selected' : '' }}>current</option>
                            <option value="overdue" {{ old('payment_status', $contract->payment_status) == 'overdue' ? 'selected' : '' }}>overdue</option>
                            <option value="paid_ahead" {{ old('payment_status', $contract->payment_status) == 'paid_ahead' ? 'selected' : '' }}>paid_ahead</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Catatan</label>
                        <textarea class="form-control" name="notes" rows="4">{{ old('notes', $contract->notes) }}</textarea>
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-pink px-4">Simpan Perubahan</button>
                    <a href="{{ route('kontrak') }}" class="btn btn-outline-secondary px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

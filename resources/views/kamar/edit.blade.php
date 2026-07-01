@extends('layouts.app')

@section('title', 'Edit Kamar')

@section('content')

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold">Edit Kamar</h2>
                <p class="text-secondary mb-0">Perbarui informasi kamar dan foto.</p>
            </div>
            <a href="{{ route('kamar.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form method="POST" action="{{ route('kamar.update', $room->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Kode Kamar</label>
                        <input type="text" class="form-control" name="room_code" value="{{ old('room_code', $room->room_code) }}" placeholder="Contoh : Thursina 3" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tipe Kamar</label>
                        <select class="form-select" name="type" required>
                            <option value="Standard" {{ old('type', $room->type) == 'Standard' ? 'selected' : '' }}>Standard</option>
                            <option value="AC" {{ old('type', $room->type) == 'AC' ? 'selected' : '' }}>AC</option>
                            <option value="En-Suite" {{ old('type', $room->type) == 'En-Suite' ? 'selected' : '' }}>En-Suite</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Lantai</label>
                        <input type="number" class="form-control" name="floor" value="{{ old('floor', $room->floor) }}" min="1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kapasitas Penghuni</label>
                        <input type="number" class="form-control" name="max_occupants" value="{{ old('max_occupants', $room->max_occupants) }}" min="1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Luas Kamar (m²)</label>
                        <input type="number" class="form-control" name="area_m2" value="{{ old('area_m2', $room->area_m2) }}" placeholder="Contoh 12" step="0.01">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Harga Per Bulan</label>
                        <input type="number" class="form-control" name="monthly_price" value="{{ old('monthly_price', $room->monthly_price) }}" placeholder="700000" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Fasilitas</label>
                        <textarea class="form-control" name="facilities" rows="3" placeholder="Kasur, Lemari, AC">{{ old('facilities', $room->facilities) }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="available" {{ old('status', $room->status) == 'available' ? 'selected' : '' }}>Tersedia</option>
                            <option value="occupied" {{ old('status', $room->status) == 'occupied' ? 'selected' : '' }}>Dipesan</option>
                            <option value="maintenance" {{ old('status', $room->status) == 'maintenance' ? 'selected' : '' }}>Perawatan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Foto Kamar</label>
                        <input class="form-control" type="file" name="photo" accept="image/*">
                        @if($room->photo)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $room->photo) }}" alt="Foto" style="width:160px; height:120px; object-fit:cover;" class="rounded-3">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-3 d-flex gap-2">
                    <a href="{{ route('kamar.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
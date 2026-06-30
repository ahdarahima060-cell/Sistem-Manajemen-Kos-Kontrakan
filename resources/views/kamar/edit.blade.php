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
            <a href="{{ route('kamar') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form method="POST" action="{{ route('kamar.update', $room->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="roomName" class="form-label">Nama Kamar</label>
                        <input type="text" class="form-control" id="roomName" name="name" value="{{ old('name', $room->room_code) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="roomType" class="form-label">Tipe Kamar</label>
                        <select class="form-select" id="roomType" name="type">
                            <option value="Standard" {{ $room->type=='Standard' ? 'selected':'' }}>Standard</option>
                            <option value="AC" {{ $room->type=='AC' ? 'selected':'' }}>AC</option>
                            <option value="En-Suite" {{ $room->type=='En-Suite' ? 'selected':'' }}>En-Suite</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="roomPrice" class="form-label">Harga</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" id="roomPrice" name="monthly_price" value="{{ old('monthly_price', $room->monthly_price) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="roomStatus" class="form-label">Status</label>
                        <select class="form-select" id="roomStatus" name="status">
                            <option value="available" {{ $room->status=='available' ? 'selected':'' }}>Tersedia</option>
                            <option value="occupied" {{ $room->status=='occupied' ? 'selected':'' }}>Dipesan</option>
                            <option value="maintenance" {{ $room->status=='maintenance' ? 'selected':'' }}>Perawatan</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="roomPhoto" class="form-label">Foto Kamar</label>
                        <input class="form-control" type="file" id="roomPhoto" name="photo" accept="image/*">
                        @if($room->photo)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $room->photo) }}" alt="Foto" style="width:160px; height:120px; object-fit:cover;" class="rounded-3">
                            </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="roomDescription" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="roomDescription" name="description" rows="3">{{ old('description', $room->facilities) }}</textarea>
                    </div>
                </div>

                <div class="mt-3 d-flex gap-2">
                    <a href="{{ route('kamar') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
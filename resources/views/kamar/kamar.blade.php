@extends('layouts.app')

@section('title', 'Kamar Saya')

@section('content')

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h2 class="fw-bold">Kamar Saya</h2>
                <p class="text-secondary mb-0">Kelola kamar, lihat status ketersediaan, dan tambahkan foto kamar agar penyewa lebih mudah memilih.</p>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoomModal">
                <i class="fas fa-plus me-2"></i> Tambah Kamar
            </button>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr class="text-secondary small text-uppercase">
                            <th class="fw-semibold">No</th>
                            <th class="fw-semibold">Foto</th>
                            <th class="fw-semibold">Nama Kamar</th>
                            <th class="fw-semibold">Tipe</th>
                            <th class="fw-semibold">Status</th>
                            <th class="fw-semibold">Harga</th>
                            <th class="fw-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rooms as $index => $room)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($room->photo)
                                    <img src="{{ asset('storage/' . $room->photo) }}" alt="Foto Kamar" class="rounded-3" style="width:100px; height:75px; object-fit:cover;">
                                @else
                                    <img src="https://via.placeholder.com/100x75?text=Foto" alt="Foto Kamar" class="rounded-3" style="width:100px; height:75px; object-fit:cover;">
                                @endif
                            </td>
                            <td>{{ $room->room_code ?? 'Kamar ' . ($index + 1) }}</td>
                            <td>{{ $room->type }}</td>
                            <td>
                                @if($room->status === 'available')
                                    <span class="badge bg-success bg-opacity-10 text-success">Tersedia</span>
                                @elseif($room->status === 'occupied')
                                    <span class="badge bg-warning bg-opacity-10 text-warning">Dipesan</span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger">Perawatan</span>
                                @endif
                            </td>
                            <td>Rp {{ number_format($room->monthly_price, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('kamar.edit', $room->id) }}" class="btn btn-sm btn-outline-secondary me-1">Edit</a>
                                <form action="{{ route('kamar.destroy', $room->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kamar ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-secondary">Belum ada data kamar.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="addRoomModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRoomModalLabel">Tambah Kamar Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('kamar.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="roomName" class="form-label">Nama Kamar</label>
                                <input type="text" class="form-control" id="roomName" name="name" placeholder="Masukkan nama kamar">
                            </div>
                            <div class="col-md-6">
                                <label for="roomType" class="form-label">Tipe Kamar</label>
                                <select class="form-select" id="roomType" name="type">
                                    <option selected>Pilih tipe...</option>
                                    <option value="Standard">Standard</option>
                                    <option value="AC">AC</option>
                                    <option value="En-Suite">En-Suite</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="roomPrice" class="form-label">Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" id="roomPrice" name="monthly_price" placeholder="800000">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="roomStatus" class="form-label">Status</label>
                                <select class="form-select" id="roomStatus" name="status">
                                    <option value="available" selected>Tersedia</option>
                                    <option value="occupied">Dipesan</option>
                                    <option value="maintenance">Perawatan</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="roomPhoto" class="form-label">Foto Kamar</label>
                                <input class="form-control" type="file" id="roomPhoto" name="photo" accept="image/*">
                                <div class="form-text">Unggah foto kamar untuk mempermudah penyewa melihat fasilitas.</div>
                            </div>
                            <div class="col-12">
                                <label for="roomDescription" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="roomDescription" name="description" rows="3" placeholder="Contoh: Kamar nyaman dengan AC, lemari, dan kamar mandi dalam."></textarea>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Kamar</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection
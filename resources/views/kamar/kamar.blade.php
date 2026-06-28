@extends('layouts.app')

@section('title', 'Kamar Saya')


@section('content')


<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
            <div>
                <h2 class="fw-bold">
                    Kamar Saya
                </h2>
                <p class="text-secondary mb-0">
                    Lihat informasi kamar yang tersedia.
                </p>
            </div>

            @can('manage-kamar')

            <button class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#addRoomModal">
                <i class="fas fa-plus me-2"></i>
                Tambah Kamar
            </button>

            @endcan
        </div>
    </div>
    <div class="card shadow-sm border-0">
        <div class="card-body">
            @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr class="text-secondary small text-uppercase">
                            <th>
                                No
                            </th>
                            <th>
                                Foto
                            </th>
                            <th>
                                Nama Kamar
                            </th>
                            <th>
                                Tipe
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Harga
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($rooms as $index=>$room)
                    <tr>
                        <td>
                            {{ $index+1 }}
                        </td>
                        <td>
                            @if($room->photo)
                            <img src="{{ asset('storage/'.$room->photo) }}"
                            style="width:100px;height:75px;object-fit:cover"
                            class="rounded">

                            @else

                            <img src="https://via.placeholder.com/100x75"
                            class="rounded">
                            @endif
                        </td>
                        <td>
                            {{ $room->room_code }}
                        </td>
                        <td>
                            {{ $room->type }}
                        </td>
                        <td>
                            @if($room->status == 'available')
                            <span class="badge bg-success">
                                Tersedia
                            </span>

                            @elseif($room->status == 'occupied')

                            <span class="badge bg-warning">
                                Dipesan
                            </span>
                            @else
                            <span class="badge bg-danger">
                                Perawatan
                            </span>
                            @endif
                        </td>
                        <td>
                            Rp {{ number_format($room->monthly_price,0,',','.') }}
                        </td>
                        <td>
    {{-- SEMUA USER BOLEH DETAIL --}}
   <a href="{{ route('kamar.show',$room->id) }}"
        class="btn btn-sm btn-primary">
                  Detail
    </a>
    {{-- KHUSUS ADMIN --}}

     @can('manage-kamar')
    <a href="{{ route('kamar.edit',$room->id) }}"
         class="btn btn-sm btn-outline-secondary">
             Edit
            </a>
  <form action="{{ route('kamar.destroy',$room->id) }}"
            method="POST"
             class="d-inline">
                     @csrf
            @method('DELETE')
        <button type="submit"
            onclick="return confirm('Hapus kamar ini?')"
            class="btn btn-sm btn-outline-danger">
                    Hapus
                </button>
            </form>
        @endcan
        </td>
         </tr>
        @empty
            <tr>
            <td colspan="7"
                class="text-center">
                Belum ada data kamar.
                </td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH ADMIN SAJA --}}

    @can('manage-kamar')
        <div class="modal fade"
            id="addRoomModal">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
    <h5>
        Tambah Kamar
    </h5>
        <button class="btn-close"
            data-bs-dismiss="modal"></button>
    </div>
        <form action="{{ route('kamar.store') }}"
            method="POST"
                enctype="multipart/form-data">
                @csrf
        <div class="modal-body">
            <input type="text"
                name="room_code"
                class="form-control mb-3"
                placeholder="Kode Kamar">
            <select name="type"
                class="form-control mb-3">
            <option value="Standard">
                Standard
            </option>
            <option value="AC">
                AC
            </option>
            <option value="En-Suite">
                En-Suite
            </option>
            </select>
                <input type="number"    
                        name="monthly_price"
                        class="form-control mb-3"
                        placeholder="Harga">
            <select name="status"
                    class="form-control mb-3">
            <option value="available">
                    Tersedia
            </option>
            <option value="occupied">
                    Dipesan
            </option>
            <option value="maintenance">
            Perawatan
            </option>
            </select>
            <input type="file"
            name="photo"
            class="form-control">
            </div>
            <div class="modal-footer">
            <button type="submit"
            class="btn btn-primary">
            Simpan
            </button>
                         </div>
                    </form>
                </div>
              </div>
         </div>
         @endcan
     </div>
     @endsection
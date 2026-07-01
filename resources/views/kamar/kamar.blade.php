@extends('layouts.app')

@section('title','Kamar Saya')


@section('content')


<div class="container-fluid">


    <div class="row mb-4">


        <div class="col-12 d-flex justify-content-between align-items-center">


            <div>

                <h2 class="fw-bold mb-1">
                    Kamar Saya
                </h2>


                <p class="text-secondary mb-0">
                    Lihat informasi kamar yang tersedia.
                </p>


            </div>





            @if(Auth::user()->role == 'admin')


            <button class="btn-tambah-kamar"
                data-bs-toggle="modal"
                data-bs-target="#addRoomModal">


                <i class="fas fa-plus"></i>

                Tambah Kamar


            </button>



            @endif



        </div>


    </div>






    <div class="card shadow-sm">


        <div class="card-body">



            @if(session('success'))

            <div class="alert alert-success">

                {{session('success')}}

            </div>

            @endif





            <table class="table table-hover align-middle">


                <thead>


                    <tr>


                        <th>No</th>

                        <th>Foto</th>

                        <th>Kode Kamar</th>

                        <th>Tipe</th>

                        <th>Status</th>

                        <th>Harga</th>

                        <th>Aksi</th>


                    </tr>


                </thead>

                <tbody>


                    @foreach($rooms as $index=>$room)


                    <tr>


                        <td>
                            {{$index+1}}
                        </td>

                        <td>


                            @if($room->photo)


                            <img src="{{asset('storage/'.$room->photo)}}"
                                width="100"
                                height="75"
                                class="rounded"
                                style="object-fit:cover">


                            @else

                            Tidak ada foto

                            @endif


                        </td>


                        <td>
                            {{$room->room_code}}
                        </td>


                        <td>
                            {{$room->type}}
                        </td>

                        <td>
                            @if($room->status == 'available')
                                <span class="badge bg-success">Tersedia</span>
                            @elseif($room->status == 'occupied')
                                @php
                                    $isOwner = Auth::check() && \App\Models\TenantContract::where('room_id', $room->id)->where('user_id', Auth::id())->exists();
                                @endphp

                                @if($isOwner)
                                    <span class="badge bg-warning">Dipesan</span>
                                @else
                                    <span class="badge bg-secondary">Sudah Terisi</span>
                                @endif
                            @else
                                <span class="badge bg-danger">Perawatan</span>
                            @endif
                        </td>


                        <td>

                            Rp {{number_format($room->monthly_price,0,',','.')}}

                        </td>

                        <td>


                            <a href="{{route('kamar.show',$room->id)}}"
                                class="btn btn-primary btn-sm">

                                Detail

                            </a>

                            @if(Auth::user()->role=='admin')
                                <a href="{{ route('kamar.edit', $room->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <form action="{{route('kamar.destroy',$room->id)}}"
                                    method="POST"
                                    class="d-inline">


                                @csrf

                                @method('DELETE')


                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus kamar ini?')">

                                    Hapus

                                </button>


                            </form>


                            @endif


                        </td>


                    </tr>


                    @endforeach


                </tbody>


            </table>


        </div>


    </div>


    @if(Auth::user()->role=='admin')

    <div class="modal fade"
        id="addRoomModal">


        <div class="modal-dialog modal-lg">


            <div class="modal-content">


                <div class="modal-header">


                    <h5 class="fw-bold">

                        <i class="fas fa-door-open"></i>

                        Tambah Data Kamar

                    </h5>

                    <button class="btn-close"
                        data-bs-dismiss="modal">

                    </button>


                </div>

                <form action="{{route('kamar.store')}}"
                    method="POST"
                    enctype="multipart/form-data">


                    @csrf


                    <div class="modal-body">


                        <label>Kode Kamar</label>

                        <input type="text"
                            name="room_code"
                            class="form-control mb-3"
                            placeholder="Contoh : Thursina 3"
                            required>

                        <label>Tipe Kamar</label>

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


                        <label>Lantai</label>

                        <input type="number"
                            name="floor"
                            class="form-control mb-3"
                            value="1">

                        <label>Kapasitas Penghuni</label>

                        <input type="number"
                            name="max_occupants"
                            class="form-control mb-3"
                            value="1">

                        <label>Luas Kamar (m²)</label>

                        <input type="number"
                            name="area_m2"
                            class="form-control mb-3"
                            placeholder="Contoh 12">

                        <label>Fasilitas</label>

                        <textarea name="facilities"
                            class="form-control mb-3"
                            rows="3"
                            placeholder="Kasur, Lemari, AC">

</textarea>





                        <label>Harga Per Bulan</label>

                        <input type="number"
                            name="monthly_price"
                            class="form-control mb-3"
                            placeholder="700000"
                            required>





                        <label>Status</label>

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





                        <label>Foto Kamar</label>

                        <input type="file"
                            name="photo"
                            class="form-control">


                    </div>

                    <div class="modal-footer">


                        <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                            Batal

                        </button>




                        <button type="submit"
                            class="btn btn-primary">

                            <i class="fas fa-save"></i>

                            Simpan

                        </button>


                    </div>



                </form>


            </div>


        </div>


    </div>

    @endif

</div>

<style>
    .btn-tambah-kamar {

        background: #0d6efd;

        color: white;

        border: none;

        padding: 7px 15px;

        font-size: 14px;

        border-radius: 8px;

        height: 38px;

        display: flex;

        align-items: center;

        gap: 6px;

        cursor: pointer;


    }

    .btn-tambah-kamar:hover {

        background: #0b5ed7;

    }
</style>

@endsection
@extends('layouts.app')

@section('title','Detail Kamar')


@section('content')


<div class="container-fluid">
    <a href="{{ route('kamar') }}" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>

    {{-- DETAIL KAMAR --}}

    <div class="card shadow border-0 mb-4">
        <div class="card-body">

            <div class="row">

                <div class="col-md-5">
                    @if($room->photo)

                    <img src="{{ asset('storage/'.$room->photo) }}"
                    class="img-fluid rounded"
                    style="width:100%;height:350px;object-fit:cover;">

                    @else
                    <img src="https://via.placeholder.com/500x350"
                    class="img-fluid rounded">
                    @endif
                </div>
                <div class="col-md-7">

                    <h2 class="fw-bold">

                        {{ $room->room_code }}

                    </h2>
                    <hr>
                    <p>
                        <b>Tipe Kamar :</b>
                        {{ $room->type }}
                    </p>
                    <p>
                        <b>Lantai :</b>
                        {{ $room->floor }}
                    </p>
                    <p>
                        <b>Luas :</b>
                        {{ $room->area_m2 ?? '-' }} m²
                    </p>
                    <p>
                        <b>Kapasitas :</b>
                        {{ $room->max_occupants }} Orang
                    </p>
                    <p>
                        <b>Harga :</b>

                        Rp {{ number_format(
                            $room->monthly_price,
                            0,
                            ',',
                            '.'
                        ) }}
                    </p>
                    <p>
                        <b>Status :</b>
                        @if($room->status == 'available')

                        <span class="badge bg-success">
                            Tersedia
                        </span>

                        @elseif($room->status == 'occupied')

                        <span class="badge bg-warning">
                            Terisi
                        </span>
                        @else
                        <span class="badge bg-danger">
                            Maintenance
                        </span>
                        @endif
                    </p>
                    <p>
                        <b>Fasilitas :</b>
                    </p>
                    <p>
                        {{ $room->facilities ?? '-' }}
                    </p>
                    <hr>
                    <h4>
                        ⭐ Rating :
                        {{ $averageRating }}/5
                    </h4>
                </div>
            </div>
        </div>
    </div>

    {{-- FORM RATING USER --}}

    @if(Auth::user()->role == 'user')
    <div class="card shadow border-0 mb-4">
        <div class="card-header">
            Berikan Rating
        </div>
        <div class="card-body">
            <form action="{{ route('kamar.rate',$room->id) }}"
            method="POST">
                @csrf
                <label>
                    Rating
                </label>
                <select name="rating"
                class="form-control mb-3"
                required>
                    <option value="">
                        Pilih Rating
                    </option>
                    <option value="5">
                        ⭐⭐⭐⭐⭐
                    </option>
                    <option value="4">
                        ⭐⭐⭐⭐
                    </option>
                    <option value="3">
                        ⭐⭐⭐
                    </option>
                    <option value="2">
                        ⭐⭐
                    </option>
                    <option value="1">
                        ⭐
                    </option>
                </select>
                <label>
                    Komentar
                </label>
                <textarea name="comment"
                class="form-control mb-3"
                placeholder="Tulis komentar..."></textarea>
                <button class="btn btn-primary">
                    Kirim Rating
                </button>
            </form>
        </div>
    </div>
    @endif

    {{-- LIST RATING --}}
    <div class="card shadow border-0">
        <div class="card-header">
            Review Penyewa
        </div>
        <div class="card-body">
            @forelse($room->ratings as $rating)
            <div class="border rounded p-3 mb-3">
                <h5>
                    ⭐ {{ $rating->rating }}/5
                </h5>
                <p>
                    {{ $rating->comment }}
                </p>
                <small class="text-muted">
                    {{ $rating->created_at->format('d M Y') }}
                </small>
            </div>
            @empty
            <p class="text-muted">
                Belum ada rating
            </p>
            @endforelse
        </div>
    </div>
</div>
@endsection
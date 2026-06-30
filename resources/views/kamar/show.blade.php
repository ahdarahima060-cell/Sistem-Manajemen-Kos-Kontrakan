@extends('layouts.app')


@section('title','Detail Kamar')


@section('content')


<div class="container-fluid">


    <a href="{{route('kamar.index')}}"
        class="btn btn-secondary mb-3">

        ← Kembali

    </a>


    <div class="card shadow-sm">


        <div class="card-body">



            <div class="row">



                <div class="col-md-5">


                    @if($room->photo)


                    <img src="{{asset('storage/'.$room->photo)}}"
                        class="img-fluid rounded"
                        style="height:300px;width:100%;object-fit:cover">


                    @else


                    <img src="https://via.placeholder.com/400"
                        class="img-fluid rounded">


                    @endif


                </div>






                <div class="col-md-7">



                    <h2 class="fw-bold">

                        {{$room->room_code}}

                    </h2>



                    <hr>



                    <p>
                        <b>Tipe :</b>
                        {{$room->type}}
                    </p>

                    <p>
                        <b>Lantai :</b>
                        {{$room->floor}}
                    </p>

                    <p>
                        <b>Kapasitas :</b>
                        {{$room->max_occupants}} orang
                    </p>



                    <p>
                        <b>Luas :</b>
                        {{$room->area_m2}} m²
                    </p>

                    <p>
                        <b>Fasilitas :</b>
                        {{$room->facilities}}
                    </p>

                    <p>
                        <b>Harga :</b>

                        Rp {{number_format($room->monthly_price,0,',','.')}}
                    </p>

                    <p>

                        <b>Status :</b>


                        @if($room->status=='available')

                        <span class="badge bg-success">
                            Tersedia
                        </span>


                        @elseif($room->status=='occupied')


                        <span class="badge bg-warning">

                            Dipesan

                        </span>


                        @else


                        <span class="badge bg-danger">

                            Perawatan

                        </span>


                        @endif
                    </p>

                </div>

            </div>

            <hr>


            //Rating kamar

            <h4 class="fw-bold">

                ⭐ Rating Kamar

            </h4>


            @if(Auth::user()->role == 'user')



            <form action="{{route('kamar.rate',$room->id)}}"
                method="POST">


                @csrf


                <select name="rating"
                    class="form-control mb-3">


                    <option value="5">
                        ⭐⭐⭐⭐⭐ Sangat Bagus
                    </option>

                    <option value="4">
                        ⭐⭐⭐⭐ Bagus
                    </option>

                    <option value="3">
                        ⭐⭐⭐ Cukup
                    </option>

                    <option value="2">
                        ⭐⭐ Kurang
                    </option>

                    <option value="1">
                        ⭐ Buruk
                    </option>

                </select>

                <textarea name="comment"
                    class="form-control mb-3"
                    placeholder="Tulis komentar">

            </textarea>

                <button class="btn btn-primary">

                    Kirim Rating

                </button>

            </form>

            @endif

        </div>

    </div>

</div>

@endsection
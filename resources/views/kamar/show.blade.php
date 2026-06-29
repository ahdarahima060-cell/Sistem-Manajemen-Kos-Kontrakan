@extends('layouts.app')

@section('title','Detail Kamar')


@section('content')


<div class="container-fluid">


    <a href="{{route('kamar.index')}}"
        class="btn btn-secondary mb-3">

        ← Kembali

    </a>




    <div class="card shadow">


        <div class="card-body">


            <div class="row">


                <div class="col-md-6">


                    @if($room->photo)

                    <img src="{{asset('storage/'.$room->photo)}}"
                        class="img-fluid rounded"
                        style="height:400px;width:100%;object-fit:cover">


                    @else

                    <img src="https://via.placeholder.com/500"
                        class="img-fluid rounded">

                    @endif


                </div>






                <div class="col-md-6">


                    <h1 class="fw-bold">

                        {{$room->room_code}}

                    </h1>


                    <hr>



                    <p>
                        <b>Tipe Kamar :</b>
                        {{$room->type}}
                    </p>



                    <p>
                        <b>Lantai :</b>
                        {{$room->floor}}
                    </p>



                    <p>
                        <b>Luas :</b>
                        {{$room->area_m2 ?? '-'}} m²
                    </p>




                    <p>
                        <b>Kapasitas :</b>
                        {{$room->max_occupants}}
                        Orang
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




                    <p>

                        <b>Fasilitas :</b>

                        <br>

                        {{$room->facilities ?? 'Belum ada fasilitas'}}

                    </p>



                </div>


            </div>


        </div>


    </div>



</div>


@endsection
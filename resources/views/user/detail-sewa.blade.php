@extends('layouts.app')

@section('title','Detail Sewa')


@section('content')


<div class="container-fluid">


    <h2 class="fw-bold mb-4">
        Detail Data Sewa
    </h2>



    <div class="card shadow-sm">


        <div class="card-body">


            <h5>
                Nama Penyewa :
                {{ $data['nama'] }}
            </h5>


            <hr>


            <p>
                <b>Kamar :</b>
                {{ $data['kamar'] }}
            </p>



            <p>
                <b>Tanggal Mulai :</b>
                {{ $data['mulai'] }}
            </p>



            <p>
                <b>Jatuh Tempo :</b>
                {{ $data['jatuh_tempo'] }}
            </p>



            <p>
                <b>Status :</b>


                @if($data['status']=="Aktif")

                <span class="badge bg-success">
                    Aktif
                </span>


                @else

                <span class="badge bg-danger">
                    Selesai
                </span>


                @endif


            </p>




            <a href="{{route('penyewa')}}"
                class="btn btn-secondary">

                Kembali

            </a>



        </div>


    </div>


</div>


@endsection
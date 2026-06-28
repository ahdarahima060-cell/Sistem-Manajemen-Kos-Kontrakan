@extends('layouts.app')

@section('title','Pembayaran')

@section('content')

<div class="container mt-4">

<div class="card shadow-sm border-0">

<div class="card-body">


<h3 class="fw-bold">
    Status Pembayaran
</h3>

<hr>


@if(isset($pembayaran) && $pembayaran)


    @if($pembayaran->status == 'lunas')

        <div class="alert alert-success">
            Pembayaran Lunas
        </div>

    @else

        <div class="alert alert-warning">
            Belum Lunas
        </div>

    @endif



@else


<div class="alert alert-danger">

    Belum ada data pembayaran.

</div>


@endif



</div>

</div>

</div>


@endsection
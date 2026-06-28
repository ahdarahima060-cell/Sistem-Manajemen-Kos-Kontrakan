@extends('layouts.app')

@section('title','Notifikasi')

@section('content')

<div class="container">

    <h2 class="mb-4">
        <i class="fas fa-bell"></i>
        Notifikasi
    </h2>


    @if($reminders->count() > 0)


    @foreach($reminders as $notif)

    <div class="card mb-3 shadow-sm">

        <div class="card-body">

            <h5 class="text-danger">
                <i class="fas fa-exclamation-circle"></i>
                Pengingat Pembayaran
            </h5>


            <p>
                {{ $notif->message }}
            </p>


            <small>
                Jatuh tempo :
                {{ $notif->reminder_date }}
            </small>


        </div>

    </div>


    @endforeach


    @else


    <div class="alert alert-success">

        Tidak ada notifikasi pembayaran.

    </div>


    @endif


</div>


@endsection
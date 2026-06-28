@extends('layouts.app')


@section('content')


<div class="container mt-4">


    <div class="card shadow">


        <div class="card-body">


            <h3>

                Notifikasi

            </h3>


            <hr>



            @forelse($notifications as $notif)


            <div class="alert alert-warning">


                <i class="fas fa-bell"></i>

                {{ $notif->message }}


                <br>

                <small>

                    Tanggal:
                    {{ $notif->reminder_date }}

                </small>


            </div>


            @empty


            <div class="alert alert-success">

                Belum ada notifikasi pembayaran.

            </div>


            @endforelse



        </div>


    </div>


</div>


@endsection
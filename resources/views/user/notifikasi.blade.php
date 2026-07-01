@extends('layouts.app')

@section('title','Notifikasi')

@section('content')

<div class="container">

    <h2 class="mb-4">
        <i class="fas fa-bell"></i>
        Notifikasi
    </h2>


    @if($notifications->count() > 0)

        @foreach($notifications as $notif)

            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="{{ $notif['type'] === 'payment' ? 'text-danger' : 'text-primary' }}">
                        <i class="fas fa-bell"></i>
                        {{ $notif['title'] }}
                    </h5>
                    <p>{{ $notif['message'] }}</p>
                    @if(! empty($notif['date']))
                        <small>
                            {{ $notif['date'] }}
                        </small>
                    @endif
                </div>
            </div>

        @endforeach

    @else

        <div class="alert alert-success">
            Tidak ada notifikasi.
        </div>

    @endif


</div>


@endsection
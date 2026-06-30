@extends('layouts.app')


@section('title','Profil Admin')


@section('content')


<div class="container">


    <div class="card shadow p-4">


        <h2 class="fw-bold mb-4">

            <i class="fa fa-user-circle"></i>

            Profil Admin

        </h2>



        <div class="mb-3">

            <label class="fw-bold">
                Nama
            </label>

            <p>
                {{ Auth::user()->name }}
            </p>

        </div>



        <div class="mb-3">

            <label class="fw-bold">
                Email
            </label>

            <p>
                {{ Auth::user()->email }}
            </p>

        </div>



        <div class="mb-3">

            <label class="fw-bold">
                Role
            </label>

            <p>

                <span class="badge bg-danger">

                    {{ Auth::user()->role }}

                </span>

            </p>

        </div>




        <a href="/profil/edit"
            class="btn btn-primary">

            Edit Profil

        </a>


    </div>


</div>


@endsection
@extends('layouts.app')


@section('title','Edit Profil')


@section('content')


<div class="container">


    <div class="card shadow-sm">


        <div class="card-body">


            <h3 class="mb-4">
                Edit Profil
            </h3>



            <form method="POST"
                action="{{route('profil.update')}}">


                @csrf

                @method('PATCH')



                <label>
                    Nama
                </label>

                <input type="text"
                    name="name"
                    class="form-control mb-3"
                    value="{{Auth::user()->name}}">





                <label>
                    Email
                </label>

                <input type="email"
                    name="email"
                    class="form-control mb-3"
                    value="{{Auth::user()->email}}">





                <label>
                    Password Baru (opsional)
                </label>


                <input type="password"
                    name="password"
                    class="form-control mb-3">





                <label>
                    Konfirmasi Password
                </label>


                <input type="password"
                    name="password_confirmation"
                    class="form-control mb-3">





                <button class="btn btn-primary">

                    Simpan Perubahan

                </button>




            </form>



        </div>


    </div>


</div>



@endsection
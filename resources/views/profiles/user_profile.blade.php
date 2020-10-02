@extends('layouts.app')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-md-4 text-center">
                <img src="{{ $profile->photo }}" alt="user_avatar" class="rounded-circle img-fluid mb-3">
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col">
                        <h1>{{ $profile->fullname }}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3>
                            <i class="fa far fa-envelope"></i>&nbsp;&nbsp;{{ $profile->user->email }}
                            &nbsp;&nbsp;&nbsp;
                            <i class="fa fab fa-whatsapp"></i>&nbsp;&nbsp;{{ $profile->wa_number }}
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5><i class="fa far fa-map-marker-alt"></i>&nbsp;&nbsp;{{ $profile->addressLocation() }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <blockquote class="blockquote">
                            <p class="mb-0">{{ substr($profile->about_me,0,150).'...' }}</p>
                            <footer class="blockquote-footer">{{ $profile->fullname }}</footer>
                        </blockquote>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col d-flex justify-content-around">
                        <a href=""><i class="fa fas fa-globe"></i></a>
                        <a href=""><i class="fa fab fa-facebook-f"></i></a>
                        <a href=""><i class="fa fab fa-twitter"></i></a>
                        <a href=""><i class="fa fab fa-instagram"></i></a>
                        <a href=""><i class="fa fab fa-linkedin"></i></a>
                        <a href=""><i class="fa fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
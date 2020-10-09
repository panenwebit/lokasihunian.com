@extends('layouts.app')

@section('content')
<br>
<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary border-0 mb-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-muted text-center mt-2 mb-3"><small>Sign in with credentials</small></div>
                    <div class="container">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa far fa-envelope"></i></span>
                                    </div>
                                    <input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" type="email"  value="{{ old('email') }}" autocomplete="email" required autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa far fa-lock-alt"></i></span>
                                    </div>
                                    <input class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" type="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-default my-4 btn-block"><i class="fa far fa-lock-open-alt"></i> Login</button>
                                <!-- <button type="button" class="btn btn-default my-4"><i class="fa far fa-pencil-alt"></i> Daftar</button> -->
                            </div>
                            <div class="text-center">
                                <a href="{{ url('forgot-password') }}" class="mr-3"><i class="fa far fa-key"></i> Reset Password</a>
                                <a href="{{ url('register') }}"><i class="fa far fa-pencil"></i> Daftar Baru</a>
                            </div>
                        </form>
                    </div>
                
                    <!-- <div class="text-center text-muted">
                        <small>Or sign in with ...</small>
                    </div>

                    <div class="btn-wrapper text-center">
                        <a href="#" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon"><img src="{{ asset('assets/argon/img/icons/common/facebook.svg') }}"></span>
                            <span class="btn-inner--text text-default">Facebook</span>
                        </a>
                        <a href="{{ url('/auth/google') }}" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon"><img src="{{ asset('assets/argon/img/icons/common/google.svg') }}"></span>
                            <span class="btn-inner--text text-default">Google</span>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

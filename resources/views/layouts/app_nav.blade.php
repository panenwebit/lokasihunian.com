<nav class="navbar navbar-expand-md navbar-light bg-white fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('') }}"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="LokasiHunian.com" style="width:200px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown_property" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Properti</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown_property">
                        <a class="dropdown-item" href="{{ url('property') }}?hunian=Apartemen">Apartemen</a>
                        <a class="dropdown-item" href="{{ url('property') }}?hunian=Rumah">Rumah</a>
                        <a class="dropdown-item" href="{{ url('property') }}?hunian=Tanah">Tanah</a>
                        <a class="dropdown-item" href="{{ url('property') }}?hunian=Ruko">Ruko</a>
                        <a class="dropdown-item" href="{{ url('property') }}?hunian=Vila">Vila</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('property') }}?buy=buy">Jual</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('property') }}?buy=rent">Sewa</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('property') }}?latest=latest">Terbaru</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('agen') }}">Cari Agen</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown_lainnya" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lainnya</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown_lainnya">
                        <a class="dropdown-item" href="{{ url('tentang_kami') }}">Tentang Kami</a>
                        <a class="dropdown-item" href="{{ url('hubungi_kami') }}">Hubungi Kami</a>
                        <a class="dropdown-item" href="{{ url('tanya_properti') }}">Tanya Properti</a>
                        <a class="dropdown-item" href="{{ url('simulasi_kredit') }}">Simulasi Kredit</a>
                    </div>
                </li>
                <li class="nav-item active">
                    @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="{{ auth()->user()->profile->photo }}" />
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm font-weight-bold">{{ auth()->user()->username }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div> -->
                            <a href="{{ url('dashboard') }}" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>Dashboard</span>
                            </a>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>My profile</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @else
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#loginModal">
                        <i class="fa fas fa-user"></i>&nbsp; Login / Daftar
                    </button>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
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
                            <button type="submit" class="btn btn-default my-4"><i class="fa far fa-lock-open-alt"></i> Login</button>
                            <button type="button" class="btn btn-default my-4"  data-toggle="modal" data-target="#registerModal"><i class="fa far fa-pencil-alt"></i> Daftar</button>
                        </div>
                        <div class="text-center">
                            <a href="{{ url('forgot-password') }}"><i class="fa far fa-key"></i> Reset Password</a>
                            <!-- <a href="#" data-toggle="modal" data-target="#resetPasswordModal"><i class="fa far fa-key"></i> Reset Password</a> -->
                        </div>
                    </form>
                </div>
                
                <div class="text-center text-muted">
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
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-muted text-center mt-2 mb-3"><small>Daftar Baru</small></div>
                <div class="container">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa far fa-user"></i></span>
                                </div>
                                <input class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" type="text"  value="{{ old('username') }}" autocomplete="username" required autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa far fa-lock-alt"></i></span>
                                </div>
                                <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Konfirmasi Password" type="password" required autocomplete="confirm-password">

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-default my-4 btn-block"><i class="fa far fa-pencil-alt"></i> Daftar</button>
                            <!-- <button type="button" class="btn btn-default my-4 btn-block"><i class="fa far fa-pencil-alt"></i> Daftar</button> -->
                        </div>
                    </form>
                </div>
                
                <div class="text-center text-muted">
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
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-muted text-center mt-2 mb-3"><small>Reset Password</small></div>
                <div class="container">
                    <form method="POST" action="{{ route('password.email') }}">
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
                        <div class="text-center">
                            <button type="submit" class="btn btn-default my-4 btn-block"><i class="fa far fa-key"></i> Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
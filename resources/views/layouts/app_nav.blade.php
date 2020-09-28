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
                        <a class="dropdown-item" href="#">Apartemen</a>
                        <a class="dropdown-item" href="#">Rumah</a>
                        <a class="dropdown-item" href="#">Tanah</a>
                        <a class="dropdown-item" href="#">Ruko</a>
                        <a class="dropdown-item" href="#">Vila</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Jual</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Sewa</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Terbaru</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Cari Agen</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown_lainnya" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lainnya</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown_lainnya">
                        <a class="dropdown-item" href="#">Tentang Kami</a>
                        <a class="dropdown-item" href="#">Hubungi Kami</a>
                        <a class="dropdown-item" href="#">Artikel</a>
                        <a class="dropdown-item" href="#">Tanya Properti</a>
                        <a class="dropdown-item" href="#">Simulasi Kredit</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#loginModal">
                        <i class="fa fas fa-user"></i>&nbsp; Login / Daftar
                    </button>
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
                            <button type="button" class="btn btn-default my-4"><i class="fa far fa-pencil-alt"></i> Daftar</button>
                        </div>
                        <div class="text-center">
                            <a href="#"><i class="fa far fa-key"></i> Reset Password</a>
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
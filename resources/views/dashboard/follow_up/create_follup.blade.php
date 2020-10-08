@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Follow UP</h3>
                <p class="text-sm mb-0">
                    Ini adalah formulir untuk mendaftarkan data hasil follow up yang telah dilakukan admin. <br>
                </p>
            </div>
        </div>

        <form action="{{ url('dashboard/follow_up') }}" method="post">
            @csrf
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-user"></i></span>
                </div>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" value="{{ old('nama') }}" required>
                @error('nama')
                    <span class="invalid-feedback register-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-envelope"></i></span>
                </div>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="invalid-feedback register-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-phone-alt"></i></span>
                </div>
                <input type="text" name="handphone_number" id="handphone_number" class="form-control @error('handphone_number') is-invalid @enderror" placeholder="Nomor Handphone" value="{{ old('handphone_number') }}" required>
                @error('handphone_number')
                    <span class="invalid-feedback register-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-info"></i></span>
                </div>
                <textarea name="information" id="information" class="form-control @error('information') is-invalid @enderror" cols="30" rows="5" placeholder="Informasi / Keterangan" required>{{ old('information') }}</textarea>
                @error('information')
                    <span class="invalid-feedback register-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default btn-block">Daftar Follow UP</button>
            </div>
        </form>
    </div>
@endsection
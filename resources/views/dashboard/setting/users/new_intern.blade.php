@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Tambah Pengguna Internal</h3>
                <p class="text-sm mb-0">
                    Ini adalah form untuk mendaftarkan Admin / Sales baru (Internal) . <br>
                </p>
            </div>
        </div>
        <form action="{{ url('dashboard/setting/users/new_intern') }}" method="post">
            @csrf
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-user"></i></span>
                </div>
                <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Username" required>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-envelope"></i></span>
                </div>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-lock"></i></span>
                </div>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-lock"></i></span>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password" required>
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-cog"></i></span>
                </div>
                <select name="role" id="role" class="form-control" required>
                    <option value="Admin">Admin</option>
                    <option value="Sales">Sales</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default btn-block" id="form-role-user-submit">Update Peran</button>
            </div>
        </form>
    </div>
@endsection

@section('page_js_plugins')
<script>
$(document).ready(function(){
    ;
});
</script>
@endsection
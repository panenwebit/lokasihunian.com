@extends('layouts.dashboard')

@section('content')
    <div class="container my-3">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Pengaturan Akun</h3>
                <p class="text-sm mb-0">
                    Halaman ini digunakan untuk memperbarui informasi akun anda.
                </p>
            </div>
        </div>
        <h3>Ganti Username</h3>
        <form action="{{ url('account/username') }}" method="post" id="form-username">
            @csrf
            @method('PATCH')
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-user"></i></span>
                </div>
                <input type="text" name="username" id="username_baru" class="form-control form-control-alternative @error('username') is-invalid @enderror" placeholder="Username" value="{{ $user->username }}" required>
                @error('username')
                    <span class="invalid-feedback login-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-default" id="form-username-submit">Update Username</button>
            </div>
        </form>
    </div>

    <div class="container my-3">
        <h3>Ganti Password</h3>
        <form action="{{ url('account/password') }}" method="post" id="form-password">
            @csrf
            @method('PATCH')
            <div class="row">
                @if($user->password!=null)
                <div class="col-md-4 mb-3">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fas fa-unlock-alt"></i></span>
                        </div>
                        <input type="password" name="password_lama" id="password_lama" class="form-control form-control-alternative @error('password_lama') is-invalid @enderror" placeholder="Password lama">
                        @error('password_lama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                @endif
                <div class="col-md-4 mb-3">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fas fa-lock-alt"></i></span>
                        </div>
                        <input type="password" name="password_baru" id="password_baru" class="form-control form-control-alternative @error('password_baru') is-invalid @enderror" placeholder="Password baru">
                        @error('password_baru')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-lock-alt"></i></span>
                        </div>
                        <input type="password" name="password_confirm" id="password_confirm" class="form-control form-control-alternative @error('password_confirm') is-invalid @enderror" placeholder="Konfirmasi password">
                        @error('password_confirm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-default" id="form-password-submit">Update Password</button>
            </div>
        </form>
    </div>
@endsection

@section('page_js_plugins')
<script>
$(document).ready(function(){
    $('#form-username-submit').click(function(e){
        e.preventDefault();
        var pesan = "yakin akan memperbarui username anda?";
        bootbox.confirm({
            message: pesan,
            locale: "id",
            buttons: {
                confirm : {
                    className:'btn-default',
                }, 
                cancel :{
                    className:'btn-secondary',
                }
            },
            callback: function(result){
                if(result){
                    $('#form-username').submit();
                } else {
                    // alert('a');
                }
            }
        });
    });

    $('#form-password-submit').click(function(e){
        e.preventDefault();
        var pesan = "yakin akan memperbarui kata sandi anda?";
        bootbox.confirm({
            message: pesan,
            locale: "id",
            buttons: {
                confirm : {
                    className:'btn-default',
                }, 
                cancel :{
                    className:'btn-secondary',
                }
            },
            callback: function(result){
                if(result){
                    $('#form-password').submit();
                } else {
                    // alert('a');
                }
            }
        });
    });
});
</script>
@endsection
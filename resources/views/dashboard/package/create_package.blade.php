@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Buat Paket</h3>
                <p class="text-sm mb-0">
                    Ini adalah formulir untuk membuat paket Membership (keanggotaan) pada website lokasihunian.com . <br>
                </p>
            </div>
        </div>

        <form action="{{ url('dashboard/package/') }}" method="post" id="form-package">
            @csrf
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-box"></i></span>
                </div>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Paket" value="{{ old('name') }}" required>
                @error('name')
                    <span class="invalid-feedback register-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-money-bill-alt"></i></span>
                </div>
                <input type="number" min="0" step="1" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Harga Paket" value="{{ old('price') }}" required>
                @error('price')
                    <span class="invalid-feedback register-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-home"></i></span>
                        </div>
                        <input type="number" min="0" step="1" name="limit_listing" id="limit_listing" class="form-control @error('limit_listing') is-invalid @enderror" placeholder="Limit Listing" value="{{ old('limit_listing') }}" required>
                        @error('limit_listing')
                            <span class="invalid-feedback register-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-building"></i></span>
                        </div>
                        <input type="number" min="0" step="1" name="limit_unggulan" id="limit_unggulan" class="form-control @error('limit_unggulan') is-invalid @enderror" placeholder="Limit Listing Unggulan" value="{{ old('limit_unggulan') }}" required>
                        @error('limit_unggulan')
                            <span class="invalid-feedback register-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-images"></i></span>
                        </div>
                        <input type="number" min="1" step="1" name="limit_photo" id="limit_photo" class="form-control @error('limit_photo') is-invalid @enderror" placeholder="Limit Foto Property / Posting" value="{{ old('limit_photo') }}" required>
                        @error('limit_photo')
                            <span class="invalid-feedback register-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-default btn-block" id="form-package-submit">Buat Paket</button>
            </div>
        </form>
    </div>
@endsection

@section('page_js_plugins')
<script>
$(document).ready(function(){
    $('#form-package-submit').click(function(e){
        e.preventDefault();
        var pesan = "Apakah anda sudah yakin akan mendaftarkan paket berikut?";
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
                    $('#form-package').submit();
                } else {
                    // alert('a');
                }
            }
        });
    }); 
});
</script>
@endsection
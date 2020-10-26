@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Pengaturan Umum</h3>
            <p class="text-sm mb-0">
                Ini adalah form yang digunakan untuk memperbarui informasi umum pada website lokasihunian.com <br>
                Seperti Kontak Kantor, Tentang Kami, Kebijakan Privasi, dan Ketentuan Pengunaan.
            </p>
            <br>
            <p class="text-sm mb-0 text-right">
                Terakir di update pada {{ date('d-m-Y H:i:s', strtotime($site->updated_at)) }}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ url('dashboard/setting/umum/site_detail') }}" method="post" id="form-site-detail">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="alamat_kantor">Alamat Kantor</label>
                    <input type="text" name="alamat_kantor" class="form-control @error('alamat_kantor') is-invalid @enderror" placeholder="Alamat Kantor" value="{{ $site->address }}" required>
                    @error('alamat_kantor')
                        <span class="invalid-feedback register-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone_number">Nomor Telepon</label>
                    <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" value="{{ $site->phone_number }}" required>
                    @error('phone_number')
                        <span class="invalid-feedback register-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="wa_number">Nomor Whatsapp</label>
                    <input type="text" name="wa_number" class="form-control @error('wa_number') is-invalid @enderror" placeholder="WA Number" value="{{ $site->wa_number }}" required>
                    @error('wa_number')
                        <span class="invalid-feedback register-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="about_us">Tentang Kami</label>
                    <textarea name="about_us" id="about_us" cols="30" rows="5" class="form-control @error('about_us') is-invalid @enderror" placeholder="Tentang Kami" required>{{ $site->about_us }}</textarea>
                    @error('about_us')
                        <span class="invalid-feedback register-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-md btn-default" id="form-site-detail-submit">Update Detail Situs</button>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <form action="{{ url('dashboard/setting/umum/privacy_policy') }}" method="post" id="form-privacy">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="privacy_policy">Kebijakan Privasi</label>
                    <textarea name="privacy_policy" id="privacy_policy" cols="30" rows="10" class="form-control @error('privacy_policy') is-invalid @enderror" placeholder="Kebijakan Privasi" required>{{ $site->privacy_policy }}</textarea>
                    @error('privacy_policy')
                        <span class="invalid-feedback register-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-default" id="form-privacy-submit">Update Kebijakan Privasi</button>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <form action="{{ url('dashboard/setting/umum/tnc') }}" method="post" id="form-tnc">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="tnc">Ketentuan Pengunaan</label>
                    <textarea name="tnc" id="tnc" cols="30" rows="10" class="form-control @error('tnc') is-invalid @enderror" placeholder="Ketentuan Penggunaan" required>{{ $site->tnc }}</textarea>
                    @error('tnc')
                        <span class="invalid-feedback register-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-default" id="form-tnc-submit">Update Ketentuan Penggunaan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('page_js_plugins')
<script>
    CKEDITOR.replace('privacy_policy');
    CKEDITOR.replace('tnc');
</script>
<script>
    $(document).ready(function(){
        $('#form-site-detail-submit').click(function(e){
            e.preventDefault();
            var pesan = "Perbarui detail situs?";
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
                        $('#form-site-detail').submit();
                    } else {
                        // alert('a');
                    }
                }
            });
        });

        $('#form-privacy-submit').click(function(e){
            e.preventDefault();
            var pesan = "Perbarui Kebijakan Privasi?";
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
                        $('#form-privacy').submit();
                    } else {
                        // alert('a');
                    }
                }
            });
        });

        $('#form-tnc-submit').click(function(e){
            e.preventDefault();
            var pesan = "Perbarui Ketentuan Penggunaan?";
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
                        $('#form-tnc').submit();
                    } else {
                        // alert('a');
                    }
                }
            });
        });
    });
</script>
@endsection
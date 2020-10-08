@extends('layouts.dashboard')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-center my-3">
            <img src="{{ auth()->user()->profile->photo }}" id="user_avatar" alt="user_avatar" class="rounded-circle user_avatar" style="width:15rem;height:15rem;">
        </div>
        <div class="d-flex justify-content-center my-3">
            <form action="{{ url('profile/image') }}" method="POST" enctype="multipart/form-data" class="d-flex justify-content-center my-3">
                @csrf
                <label class="btn btn-default">
                    <input type="file" name="image_profile" id="image_profile" accept="image/jpeg, image/png" onchange="previewImage(this);">
                    Ganti Foto Profil
                </label>
                <button type="submit" class="btn btn-default" style="height:2.6rem;">Update Foto Profil</button>
            </form>
        </div>
        <form action="{{ url('dashboard/profile') }}" method="post" id="form-update-profile">
            @csrf
            @method('PATCH')
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-id-card"></i></span>
                </div>
                <input type="text" name="fullname" id="fullname" class="form-control form-control-alternative" placeholder="Nama Lengkap" value="{{ $profile->fullname }}" required>
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fab fa-whatsapp"></i></span>
                </div>
                <input type="number" min="0" step="1" name="handphone_number" id="handphone_number" class="form-control form-control-alternative @error('handphone_number') is-invalid @enderror" placeholder="Nomor Handphone" value="{{ $profile->handphone_number }}" required>
                @error('handphone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fab fa-whatsapp"></i></span>
                </div>
                <input type="number" min="0" step="1" name="wa_number" id="wa_number" class="form-control form-control-alternative @error('wa_number') is-invalid @enderror" placeholder="Nomor Whatsapp" value="{{ $profile->wa_number }}" required>
                @error('wa_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-home"></i></span>
                </div>&nbsp;
                <textarea type="text" name="address" id="address" class="form-control form-control-alternative" placeholder="Alamat" required cols="30" rows="3">{{ $profile->address }}</textarea>
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend col-md-1">
                    <span class="input-group-text"><i class="fa far fa-home"></i>&nbsp;&nbsp;<i class="fa far fa-map-marker-alt"></i></span>
                </div>
                <div class="col-sm-12 col-md-5 mb-3">
                    <select name="address_provinsi" id="address_provinsi" class="form-control select2" required></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="address_kabupaten" id="address_kabupaten" class="form-control select2" required></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="address_kecamatan" id="address_kecamatan" class="form-control select2" required></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="address_kelurahan" id="address_kelurahan" class="form-control select2" required></select>
                </div>
            </div> -->
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-smile-wink"></i></span>
                </div>
                <textarea type="text" name="about_me" id="about_me" class="form-control form-control-alternative" placeholder="Tentang Saya" required cols="30" rows="3">{{ $profile->about_me }}</textarea>
            </div>
            
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-building"></i></span>
                </div>
                <input type="text" name="company_name" id="company_name" class="form-control form-control-alternative" placeholder="Nama Perusahaan" value="{{ $profile->company_name }}">
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-building"></i></span>
                </div>&nbsp;
                <textarea type="text" name="company_address" id="company_address" class="form-control form-control-alternative" placeholder="Alamat Perusahaan" cols="30" rows="3">{{ $profile->company_address }}</textarea>
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend col-md-1">
                    <span class="input-group-text"><i class="fa far fa-building"></i>&nbsp;&nbsp;<i class="fa far fa-map-marker-alt"></i></span>
                </div>
                <div class="col-sm-12 col-md-5 mb-3">
                    <select name="company_provinsi" id="company_provinsi" class="form-control select2"></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="company_kabupaten" id="company_kabupaten" class="form-control select2"></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="company_kecamatan" id="company_kecamatan" class="form-control select2"></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="company_kelurahan" id="company_kelurahan" class="form-control select2"></select>
                </div>
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-phone-rotary"></i></span>
                </div>
                <input type="text" name="company_phone" id="company_phone" class="form-control form-control-alternative" placeholder="Nomor Telp. Perusahaan" value="{{ old('company_phone') }}">
            </div>
            <div class="row mb-0">
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fas fa-globe"></i></span>
                        </div>
                        <input type="text" name="web_address" id="web_address" class="form-control form-control-alternative" placeholder="Alamat Web" value="{{ old('web_address') }}">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-facebook-f"></i></span>
                        </div>
                        <input type="text" name="fb_profile" id="fb_profile" class="form-control form-control-alternative" placeholder="Facebook username" value="{{ old('fb_profile') }}">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-twitter"></i></span>
                        </div>
                        <input type="text" name="twitter_profile" id="twitter_profile" class="form-control form-control-alternative" placeholder="Twitter username" value="{{ old('twitter_name') }}">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-linkedin"></i></span>
                        </div>
                        <input type="text" name="linkedin_profile" id="linkedin_profile" class="form-control form-control-alternative" placeholder="LinkedIn username" value="{{ old('linkedin_profile') }}">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-instagram"></i></span>
                        </div>
                        <input type="text" name="instagram_profile" id="instagram_profile" class="form-control form-control-alternative" placeholder="Instagram username" value="{{ old('instagram_profile') }}">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-youtube"></i></span>
                        </div>
                        <input type="text" name="youtube_profile" id="youtube_profile" class="form-control form-control-alternative" placeholder="Youtube channel" value="{{ old('youtube_profile') }}">
                    </div>
                </div>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-default btn-block">Update Profile</button>
            </div>
        </form>
    </div>
@endsection

@section('page_css_plugins')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        input[type="file"] {
            display: none;
        }
    </style>
@endsection

@section('page_js_plugins')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
function widgetlokasi(SelectorProvinsi, SelectorKabupaten, SelectorKecamatan, SelectorKelurahan, URL=false){
    if(URL==false){
        URL = 'http://127.0.0.1:8000/api/lokasi/';
    }

    var SelectorProvinsi = $('#'+SelectorProvinsi);
    var SelectorKabupaten = $('#'+SelectorKabupaten);
    var SelectorKecamatan = $('#'+SelectorKecamatan);
    var SelectorKelurahan = $('#'+SelectorKelurahan);

    var html_provinsi = '';
    $.ajax({
        url: URL+'provinsi',
        method : 'GET',
        success : function(response){
            $.each(response, function(index, value){
                if(value.kode=="{{ substr($profile->company_location,0,2) }}"){
                    html_provinsi += '<option value="'+value.kode+'" selected>'+value.wilayah+'</option>';
                } else {
                    html_provinsi += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                }
            });
            SelectorProvinsi.html(html_provinsi);
            var html_kabupaten = '';
            var provinsi = SelectorProvinsi.val();
            $.ajax({
                url: URL+'kabupaten',
                data: {provinsi : provinsi},
                method : 'GET',
                success : function(response){
                    $.each(response, function(index, value){
                        if(value.kode=="{{ substr($profile->company_location,0,5) }}"){
                            html_kabupaten += '<option value="'+value.kode+'" selected>'+value.wilayah+'</option>';
                        } else {
                            html_kabupaten += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                        }
                    });
                    SelectorKabupaten.html(html_kabupaten);
                    var html_kecamatan = '';
                    var kabupaten = SelectorKabupaten.val();
                    $.ajax({
                        url: URL+'kecamatan',
                        data: {kabupaten : kabupaten},
                        method : 'GET',
                        success : function(response){
                            $.each(response, function(index, value){
                                if(value.kode=="{{ substr($profile->company_location,0,8) }}"){
                                    html_kecamatan += '<option value="'+value.kode+'" selected>'+value.wilayah+'</option>';
                                } else {
                                    html_kecamatan += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                                }
                            });
                            SelectorKecamatan.html(html_kecamatan);
                            var html_kelurahan = '';
                            var kecamatan = SelectorKecamatan.val();
                            $.ajax({
                                url: URL+'kelurahan',
                                data: {kecamatan : kecamatan},
                                method : 'GET',
                                success : function(response){
                                    $.each(response, function(index, value){
                                        if(value.kode=="{{ substr($profile->company_location,0,13) }}"){
                                            html_kelurahan += '<option value="'+value.kode+'" selected>'+value.wilayah+'</option>';
                                        } else {
                                            html_kelurahan += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                                        }
                                    });
                                    SelectorKelurahan.html(html_kelurahan);
                                },
                            });
                        },
                    });
                },
            });
        },
    });

    SelectorProvinsi.on('change', function(){
        var html_kabupaten = '';
        var provinsi = SelectorProvinsi.val();
        $.ajax({
            url: URL+'kabupaten',
            data: {provinsi : provinsi},
            method : 'GET',
            success : function(response){
                $.each(response, function(index, value){
                    html_kabupaten += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                });
                SelectorKabupaten.html(html_kabupaten);
                var html_kecamatan = '';
                var kabupaten = SelectorKabupaten.val();
                $.ajax({
                    url: URL+'kecamatan',
                    data: {kabupaten : kabupaten},
                    method : 'GET',
                    success : function(response){
                        $.each(response, function(index, value){
                            html_kecamatan += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                        });
                        SelectorKecamatan.html(html_kecamatan);
                        var html_kelurahan = '';
                        var kecamatan = SelectorKecamatan.val();
                        $.ajax({
                            url: URL+'kelurahan',
                            data: {kecamatan : kecamatan},
                            method : 'GET',
                            success : function(response){
                                $.each(response, function(index, value){
                                    html_kelurahan += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                                });
                                SelectorKelurahan.html(html_kelurahan);
                            },
                        });
                    },
                });
            },
        });
    });

    SelectorKabupaten.on('change', function(){
        var html_kecamatan = '';
        var kabupaten = SelectorKabupaten.val();
        $.ajax({
            url: URL+'kecamatan',
            data: {kabupaten : kabupaten},
            method : 'GET',
            success : function(response){
                $.each(response, function(index, value){
                    html_kecamatan += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                });
                SelectorKecamatan.html(html_kecamatan);
                var html_kelurahan = '';
                var kecamatan = SelectorKecamatan.val();
                $.ajax({
                    url: URL+'kelurahan',
                    data: {kecamatan : kecamatan},
                    method : 'GET',
                    success : function(response){
                        $.each(response, function(index, value){
                            html_kelurahan += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                        });
                        SelectorKelurahan.html(html_kelurahan);
                    },
                });
            },
        });
    });

    SelectorKecamatan.on('change', function(){
        var html_kelurahan = '';
        var kecamatan = SelectorKecamatan.val();
        $.ajax({
            url: URL+'kelurahan',
            data: {kecamatan : kecamatan},
            method : 'GET',
            success : function(response){
                $.each(response, function(index, value){
                    html_kelurahan += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                });
                SelectorKelurahan.html(html_kelurahan);
            },
        });
    });
}
</script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
        widgetlokasi('address_provinsi', 'address_kabupaten', 'address_kecamatan', 'address_kelurahan');
        widgetlokasi('company_provinsi', 'company_kabupaten', 'company_kecamatan', 'company_kelurahan');
    });

    function previewImage(input) {
        console.log('preview');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#user_avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
</script>
@endsection
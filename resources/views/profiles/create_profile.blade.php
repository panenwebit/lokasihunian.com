@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Buat Profil</h3>
                <p class="text-sm mb-0">
                    Satu langkah lagi. Isi profil anda, dan mulai nikmati semua layanan dari lokasihunian.com  <br>
                    Ini adalah formulir untuk pembuatan profil anda pada website lokasihunian.com.
                </p>
            </div>
        </div>
        <div class="d-flex justify-content-center my-3">
            <img src="{{ auth()->user()->profile->photo }}" id="create_profile_user_avatar" alt="user_avatar" class="rounded-circle user_avatar" style="width:15rem;height:15rem;">
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
        <form action="{{ url('profile') }}" method="POST" id="form-update-profile">
            @csrf
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-user"></i></span>
                </div>
                <input type="text" name="username" id="create_profile_username" class="form-control form-control-alternative" placeholder="Username" value="{{ auth()->user()->username }}" readonly required>
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-id-card"></i></span>
                </div>
                <input type="text" name="fullname" id="create_profile_fullname" class="form-control form-control-alternative" placeholder="Nama Lengkap" value="{{ old('fullname') }}" required>
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fab fa-whatsapp"></i></span>
                </div>
                <input type="number" min="0" step="1" name="wa_number" id="create_profile_wa_number" class="form-control form-control-alternative @error('wa_number') is-invalid @enderror" placeholder="Nomor Handphone / Whatsapp" value="{{ old('wa_number') }}" required>
                @error('wa_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-envelope"></i></span>
                </div>
                <input type="email" name="email" id="create_profile_email" class="form-control form-control-alternative" placeholder="Email" value="   {{ auth()->user()->email }}" readonly required>
            </div>
            <!-- <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-home"></i></span>
                </div>&nbsp;
                <textarea type="text" name="address" id="create_profile_address" class="form-control form-control-alternative" placeholder="Alamat" required cols="30" rows="3"></textarea>
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend col-md-1">
                    <span class="input-group-text"><i class="fa far fa-home"></i>&nbsp;&nbsp;<i class="fa far fa-map-marker-alt"></i></span>
                </div>
                <div class="col-sm-12 col-md-5 mb-3">
                    <select name="address_provinsi" id="create_profile_address_provinsi" class="form-control select2" required></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="address_kabupaten" id="create_profile_address_kabupaten" class="form-control select2" required></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="address_kecamatan" id="create_profile_address_kecamatan" class="form-control select2" required></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="address_kelurahan" id="create_profile_address_kelurahan" class="form-control select2" required></select>
                </div>
            </div> -->
            
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-building"></i></span>
                </div>
                <input type="text" name="company_name" id="create_profile_company_name" class="form-control form-control-alternative" placeholder="Nama Perusahaan" value="{{ old('company_name') }}" required>
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-building"></i></span>
                </div>&nbsp;
                <textarea type="text" name="company_address" id="create_profile_company_address" class="form-control form-control-alternative" placeholder="Alamat Perusahaan" cols="30" rows="3" required></textarea>
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend col-md-1">
                    <span class="input-group-text"><i class="fa far fa-building"></i>&nbsp;&nbsp;<i class="fa far fa-map-marker-alt"></i></span>
                </div>
                <div class="col-sm-12 col-md-5 mb-3">
                    <select name="company_provinsi" id="create_profile_company_provinsi" class="form-control select2"></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="company_kabupaten" id="create_profile_company_kabupaten" class="form-control select2"></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="company_kecamatan" id="create_profile_company_kecamatan" class="form-control select2"></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="company_kelurahan" id="create_profile_company_kelurahan" class="form-control select2"></select>
                </div>
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-phone-rotary"></i></span>
                </div>
                <input type="text" name="company_phone" id="create_profile_company_phone" class="form-control form-control-alternative" placeholder="Nomor Telp. Perusahaan" value="{{ old('company_phone') }}">
            </div>

            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-smile-wink"></i></span>
                </div>
                <textarea type="text" name="about_me" id="create_profile_about_me" class="form-control form-control-alternative" placeholder="Tentang Saya" value="{{ old('about_me') }}" required cols="30" rows="3"></textarea>
            </div>

            <div class="row mb-0">
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fas fa-globe"></i></span>
                        </div>
                        <input type="text" name="web_address" id="create_profile_web_address" class="form-control form-control-alternative" placeholder="Alamat Web" value="{{ old('web_address') }}">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-facebook-f"></i></span>
                        </div>
                        <input type="text" name="fb_profile" id="create_profile_fb_profile" class="form-control form-control-alternative" placeholder="Facebook username" value="{{ old('fb_profile') }}">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-twitter"></i></span>
                        </div>
                        <input type="text" name="twitter_profile" id="create_profile_twitter_profile" class="form-control form-control-alternative" placeholder="Twitter username" value="{{ old('twitter_name') }}">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-linkedin"></i></span>
                        </div>
                        <input type="text" name="linkedin_profile" id="create_profile_linkedin_profile" class="form-control form-control-alternative" placeholder="LinkedIn username" value="{{ old('linkedin_profile') }}">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-instagram"></i></span>
                        </div>
                        <input type="text" name="instagram_profile" id="create_profile_instagram_profile" class="form-control form-control-alternative" placeholder="Instagram username" value="{{ old('instagram_profile') }}">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-youtube"></i></span>
                        </div>
                        <input type="text" name="youtube_profile" id="create_profile_youtube_profile" class="form-control form-control-alternative" placeholder="Youtube channel" value="{{ old('youtube_profile') }}">
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
<script src="{{ asset('assets/js/widget_lokasi.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
        // widgetlokasi('create_profile_address_provinsi', 'create_profile_address_kabupaten', 'create_profile_address_kecamatan', 'create_profile_address_kelurahan');
        widgetlokasi('create_profile_company_provinsi', 'create_profile_company_kabupaten', 'create_profile_company_kecamatan', 'create_profile_company_kelurahan');
    });

    function previewImage(input) {
        console.log('preview');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#create_profile_user_avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
</script>
@endsection
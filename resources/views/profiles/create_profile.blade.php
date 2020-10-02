@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div>
        <!-- <span class="btn btn-success fileinput-button">
              <i class="glyphicon glyphicon-plus"></i>
              <span>Add files...</span>
              <input type="file" name="files[]" multiple="">
            </span> -->
            <form action="#" method="post" enctype="multipart-form-data" class="d-flex justify-content-center my-3 user_avatar">
                <img src="{{ auth()->user()->profile->photo }}" id="create_profile_user_avatar" alt="user_avatar" class="w-25 rounded-circle image">
                
                <div class="overlay_middle">
                    <div class="overlay_middle_text text-center btn btn-default btn-block fileinput-button">
                        <input type="file" name="user_avatar" id="file_user_avatar" size="2000000">
                    </div>
                </div>
                </span>
            </form>
        </div>
        <div class="d-flex justify-content-center my-3">
            <button type="button" class="btn btn-default">Update Foto Profil</button>
        </div>
        <form action="{{ url('profile/'.auth()->user()->username.'/create') }}" method="post" id="form-update-profile">
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
                <input type="text" name="fullname" id="create_profile_fullname" class="form-control form-control-alternative" placeholder="Nama Lengkap" required>
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fab fa-whatsapp"></i></span>
                </div>
                <input type="number" min="0" step="1" name="wa_number" id="create_profile_wa_number" class="form-control form-control-alternative" placeholder="Nomor Handphone / Whatsapp" required>
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-envelope"></i></span>
                </div>
                <input type="email" name="email" id="create_profile_email" class="form-control form-control-alternative" placeholder="Email" value="   {{ auth()->user()->email }}" readonly required>
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
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
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-smile-wink"></i></span>
                </div>
                <textarea type="text" name="about_me" id="create_profile_about_me" class="form-control form-control-alternative" placeholder="Tentang Saya" required cols="30" rows="3"></textarea>
            </div>
            
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-building"></i></span>
                </div>
                <input type="text" name="company_name" id="create_profile_company_name" class="form-control form-control-alternative" placeholder="Nama Perusahaan">
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-building"></i></span>
                </div>&nbsp;
                <textarea type="text" name="company_address" id="create_profile_company_address" class="form-control form-control-alternative" placeholder="Alamat Perusahaan" cols="30" rows="3"></textarea>
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
                <input type="text" name="company_phone" id="create_profile_company_phone" class="form-control form-control-alternative" placeholder="Nomor Telp. Perusahaan">
            </div>
            <div class="row mb-0">
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fas fa-globe"></i></span>
                        </div>
                        <input type="text" name="web_address" id="create_profile_web_address" class="form-control form-control-alternative" placeholder="Alamat Web">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-facebook-f"></i></span>
                        </div>
                        <input type="text" name="fb_profile" id="create_profile_fb_profile" class="form-control form-control-alternative" placeholder="Facebook username">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-twitter"></i></span>
                        </div>
                        <input type="text" name="twitter_profile" id="create_profile_twitter_profile" class="form-control form-control-alternative" placeholder="Twitter username">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-linkedin"></i></span>
                        </div>
                        <input type="text" name="linkedin_profile" id="create_profile_linkedin_profile" class="form-control form-control-alternative" placeholder="LinkedIn username">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-instagram"></i></span>
                        </div>
                        <input type="text" name="instagram_profile" id="create_profile_instagram_profile" class="form-control form-control-alternative" placeholder="Instagram username">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-youtube"></i></span>
                        </div>
                        <input type="text" name="youtube_profile" id="create_profile_youtube_profile" class="form-control form-control-alternative" placeholder="Youtube url">
                    </div>
                </div>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-default btn-block">Update Profile</button>
            </div>
        </form>
        <!-- <br>
        <form action="#" method="POST" id="form-update-sosmed">
            <div class="row mb-0">
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fas fa-globe"></i></span>
                        </div>
                        <input type="text" name="web_address" id="create_profile_web_address" class="form-control form-control-alternative" placeholder="Alamat Web">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-facebook-f"></i></span>
                        </div>
                        <input type="text" name="fb_profile" id="create_profile_fb_profile" class="form-control form-control-alternative" placeholder="Facebook username">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-twitter"></i></span>
                        </div>
                        <input type="text" name="twitter_profile" id="create_profile_twitter_profile" class="form-control form-control-alternative" placeholder="Twitter username">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-linkedin"></i></span>
                        </div>
                        <input type="text" name="linkedin_profile" id="create_profile_linkedin_profile" class="form-control form-control-alternative" placeholder="LinkedIn username">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-instagram"></i></span>
                        </div>
                        <input type="text" name="instagram_profile" id="create_profile_instagram_profile" class="form-control form-control-alternative" placeholder="Instagram username">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fab fa-youtube"></i></span>
                        </div>
                        <input type="text" name="youtube_profile" id="create_profile_youtube_profile" class="form-control form-control-alternative" placeholder="Youtube url">
                    </div>
                </div>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-default">Update Social Media</button>
            </div>
        </form> -->
        <!-- <br>
        <form action="#" method="POST" id="form-update-password">
            <div class="row mb-0">
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fas fa-unlock-alt"></i></span>
                        </div>
                        <input type="password" name="password_lama" id="create_profile_password_lama" class="form-control form-control-alternative" placeholder="Password lama">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fas fa-lock-alt"></i></span>
                        </div>
                        <input type="password" name="password_baru" id="create_profile_password_baru" class="form-control form-control-alternative" placeholder="Password baru">
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="input-group input-group-merge input-group-alternative my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-lock-alt"></i></span>
                        </div>
                        <input type="password" name="password_confirm" id="create_profile_password_confirm" class="form-control form-control-alternative" placeholder="Konfirmasi password">
                    </div>
                </div>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-default">Update Password</button>
            </div>
        </form> -->
    </div>
@endsection

@section('page_css_plugins')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <style>
        .overlay_middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 25vw;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        @media only screen and (max-width: 500px){
            .overlay_middle {
                transition: .5s ease;
                opacity: 0;
                position: absolute;
                top: 35vw;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                text-align: center;
            }
        }

        @media only screen and (min-width: 767px){
            .overlay_middle {
                transition: .5s ease;
                opacity: 0;
                position: absolute;
                top: 20vw;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                text-align: center;
            }
        }

        .user_avatar:hover .image {
            opacity: 0.3;
        }

        .user_avatar:hover .overlay_middle {
            opacity: 1;
        }

        .overlay_middle_text {
            /* background-color: #4CAF50; */
            color: black;
            font-size: 16px;
            padding: 16px 32px;
        }
        .fileinput-button {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
    </style>
@endsection

@section('page_js_plugins')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{ asset('assets/js/widget_lokasi.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
        widgetlokasi('create_profile_address_provinsi', 'create_profile_address_kabupaten', 'create_profile_address_kecamatan', 'create_profile_address_kelurahan');
        widgetlokasi('create_profile_company_provinsi', 'create_profile_company_kabupaten', 'create_profile_company_kecamatan', 'create_profile_company_kelurahan');

        // $('.overlay_middle').click(function(){
        //     alert('hi');
        // });
    });
</script>
@endsection
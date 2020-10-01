@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-center my-3">
            <img src="{{ auth()->user()->profile->photo }}" alt="user_avatar" class="w-25 rounded-circle">
        </div>
        <div class="d-flex justify-content-center my-3">
            <button type="button" class="btn btn-default">Update Foto Profil</button>
        </div>
        <form action="#" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="username" id="create_profile_username" class="form-control form-control-alternative" placeholder="Username" value="{{ auth()->user()->username }}" required>
            </div>
            <div class="form-group">
                <input type="text" name="fullname" id="create_profile_fullname" class="form-control form-control-alternative" placeholder="Nama Lengkap" required>
            </div>
            <div class="form-group">
                <input type="text" name="address" id="create_profile_address" class="form-control form-control-alternative" placeholder="Alamat" required>
            </div>
            <div class="form-group">
                <input type="text" name="wa_number" id="create_profile_wa_number" class="form-control form-control-alternative" placeholder="Nomor Handphone / Whatsapp" required>
            </div>
            <div class="form-group">
                <input type="text" name="about_me" id="create_profile_about_me" class="form-control form-control-alternative" placeholder="Tentang Saya" required>
            </div>
            <div class="form-group">
                <input type="text" name="web_address" id="create_profile_web_address" class="form-control form-control-alternative" placeholder="Alamat Web">
            </div>
            <div class="form-group">
                <input type="text" name="fb_profile" id="create_profile_fb_profile" class="form-control form-control-alternative" placeholder="Facebook username">
            </div>
            <div class="form-group">
                <input type="text" name="twitter_profile" id="create_profile_twitter_profile" class="form-control form-control-alternative" placeholder="Twitter username">
            </div>
            <div class="form-group">
                <input type="text" name="instagram_profile" id="create_profile_instagram_profile" class="form-control form-control-alternative" placeholder="Instagram username">
            </div>
            <div class="form-group">
                <input type="text" name="youtube_profile" id="create_profile_youtube_profile" class="form-control form-control-alternative" placeholder="Youtube url">
            </div>
            <div class="form-group">
                <input type="text" name="company_name" id="create_profile_company_name" class="form-control form-control-alternative" placeholder="Nama Perusahaan">
            </div>
            <div class="form-group">
                <input type="text" name="company_address" id="create_profile_company_address" class="form-control form-control-alternative" placeholder="Alamat Perusahaan">
            </div>
            <div class="form-group">
                <input type="text" name="company_phone" id="create_profile_company_phone" class="form-control form-control-alternative" placeholder="Nomor Telp. Perusahaan">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default btn-block">Update Profile</button>
            </div>
        </form>
    </div>
@endsection
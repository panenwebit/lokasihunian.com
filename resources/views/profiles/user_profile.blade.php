@extends('layouts.app')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-md-4 text-center">
                <img src="{{ $profile->photo }}" alt="user_avatar" class="rounded-circle img-fluid mb-3" style="width:15rem;height;15rem;">
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col d-flex ">
                        <h1 class="flex-fill">{{ $profile->fullname }}</h1>
                        @auth
                            @if(auth()->user()->username==$profile->user->username)
                                <a href="{{ url('profile/edit') }}" class="btn btn-link">Edit Profile</a>
                            @endif
                        @endauth
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3>
                            <i class="fa far fa-envelope"></i>&nbsp;&nbsp;{{ $profile->user->email }}
                            &nbsp;&nbsp;&nbsp;
                            <i class="fa fab fa-whatsapp"></i>&nbsp;&nbsp;{{ $profile->wa_number }}
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5><i class="fa far fa-building"></i>&nbsp;&nbsp;{{ $profile->company_name }},&nbsp;<i class="fa far fa-map-marker-alt"></i>&nbsp;&nbsp;{{ $profile->company_name }},&nbsp;{{ $profile->addressLocation() }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <blockquote class="blockquote">
                            <p class="mb-0">{{ substr($profile->about_me,0,150).'...' }}</p>
                            <footer class="blockquote-footer">{{ $profile->fullname }}</footer>
                        </blockquote>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col d-flex justify-content-around">
                        <a href="http://{{ $profile->web_address }}" target="_blank"><i class="fa fas fa-globe"></i></a>
                        <a href="https://www.facebook.com/{{ $profile->fb_profile }}" target="_blank"><i class="fa fab fa-facebook-f"></i></a>
                        <a href="https://www.twitter.com/{{ $profile->twitter_profile }}" target="_blank"><i class="fa fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/{{ $profile->ig_profile }}" target="_blank"><i class="fa fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/{{ $profile->linkedin_profile }}" target="_blank"><i class="fa fab fa-linkedin"></i></a>
                        <a href="https://www.youtube.com/c/{{ $profile->yt_profile }}" target="_blank"><i class="fa fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center align-items-center d-sm-none d-md-block" id="qr">
                <img src="{{ asset($profile->qr_code) }}" alt="qr_user" class="img-fluid pl-3 pb-3 rounded">
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="row justify-content-center">
                @foreach($property as $prop)
                <div class="col-sm-6 col-md-4">
                    <div class="card shadow">
                        <a href="{{ url('property/'.$prop->property_slug) }}">
                            <img src="{{ asset($prop->images) }}" alt="" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <div class="d-flex">
                                <a href="{{ url('property/'.$prop->property_slug) }}">
                                    <h5>{{ $prop->property_title }}</h5>
                                </a>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p><small><i class="fal fa-building"></i> {{ $prop->property_building_area }} m<sup>2</sup></small></p>
                                <p><small><i class="fal fa-arrows"></i> {{ $prop->property_surface_area }} m<sup>2</sup></small></p>
                                <p><small><i class="fal fa-bed"></i> {{ $prop->property_bedroom_count }} </small></p>
                                <p><small><i class="fal fa-bath"></i> {{ $prop->property_bathroom_count }} </small></p>
                                <p><small><i class="fal fa-parking-circle"></i> {{ $prop->property_parking_count }} </small></p>
                            </div>
                            <div class="d-flex">
                                <h3>Rp. {{ number_format($prop->property_price, 0, ',', '.') }}</h3>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="{{ url('profile/'.$prop->username) }}">
                                    <img src="{{ $prop->photo }}" alt="" class="img-fluid rounded mr-2" style="width:3.35rem;">
                                </a>
                                <span class="flex-fill">
                                    <a href="{{ url('profile/'.$prop->username) }}">
                                        <h5>{{ $prop->fullname }}</h5>
                                    </a>
                                </span>
                                <button type="button" class="btn btn-default btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Simulasi Kredit" style="width:2.2rem;height:2.2rem;"><i class="fal fa-calculator"></i></button>
                                <a href="https://wa.me/62{{ substr($prop->wa_number,1) }}" target="_blank" class="btn btn-slack btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Whatsapp Agen" style="width:2.2rem;height:2.2rem;"><i class="fab fa-whatsapp"></i></a>
                                <a href="tel:{{ $prop->wa_number }}" class="btn btn-warning btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Hubungi Agen" style="width:2.2rem;height:2.2rem;"><i class="fas fa-phone"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                @if($hasPaginator)
                    <?php
                        $urlFull  = url()->full();
                        if(isset($_GET['page'])){
                            $currentPage = $_GET['page'];
                            $urlSplit = explode("page=", $urlFull);
                            $url = $urlSplit[0].substr($urlSplit[1],2);
                        } else {
                            $currentPage = "";
                            $url = $urlFull;
                        }

                        if(str_contains($url, '?')){
                            $url2 = $url.'&page=all';
                        } else {
                            $url2 = $url.'?page=all';
                        }
                    ?>
                    <div class="col-sm-12 col-md-4">
                        
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <span>{{ $property->withPath($url)->onEachSide(2)->links() }}</span>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <span class=""><a href="{{ $url2 }}" class="btn btn-link btn-block">Tampilkan semua</a></span>
                    </div>
                @endif
            </div>
            <br>
        </div>
    </div>
@endsection

@section('page_css_plugins')
<style>
@media only screen and (max-width: 575px) {
    #qr{
        display:none;
    }
}
</style>
@endsection
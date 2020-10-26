@extends('layouts.app')

@section('content')
    <br>
    <style>
        .premium-badge{
            background-color:#000;
            font-size:0.75rem;
            padding: 2.5px;
            color:#fff;
            border-radius:5%;
        }
    </style>
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-md-4 text-center">
                <img src="{{ $profile->photo }}" alt="user_avatar" class="rounded-circle img-fluid mb-3" style="width:15rem;height;15rem;">
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col d-flex ">
                        <h1 class="flex-fill">{{ $profile->fullname }}&nbsp;@if(isset($profile->user->membership->package->price) && $profile->user->membership->package->price!=0)<span class="premium-badge"><i class="fas fa-star text-yellow"></i> PREMIUM</span>@endif</h1>
                        @auth
                            @if(auth()->user()->username==$profile->user->username)
                                <a href="{{ url('dashboard/profile/edit') }}" class="btn btn-link">Edit Profile</a>
                            @else
                                @if($isFollowing)
                                    <button type="button" class="btn btn-secondary" id="btn-follow" data-id="{{ $profile->user->username }}" style="height:2.5rem;"><span><i class="fas fa-heart text-danger"></i>&nbsp;&nbsp;Follow</span></button>
                                @else
                                    <button type="button" class="btn btn-secondary" id="btn-follow" data-id="{{ $profile->user->username }}" style="height:2.5rem;"><span><i class="far fa-heart"></i>&nbsp;&nbsp;Follow</span></button>
                                @endif
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
                        <h5>@if($profile->user->getRoleNames()[0]=='Agen Perusahaan' || $profile->user->getRoleNames()[0]=='Developer')<i class="fa far fa-building"></i>&nbsp;&nbsp;{{ $profile->company_name }}&nbsp;@endif<i class="fa far fa-map-marker-alt"></i>&nbsp;&nbsp;{{ $profile->addressLocation() }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>{{ $property->total() }}&nbsp;&nbsp;Property</p>
                    </div>
                    <div class="col">
                        <p><span id="follower">{{ $profile->user->followers->count() }}</span>&nbsp;&nbsp;Follower</p>
                    </div>
                    <div class="col">
                        <p><span id="following">{{ $profile->user->followings->count() }}</span>&nbsp;&nbsp;Following</p>
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
                @if($profile->user->getRoleNames()[0]=='Agen Independen' || $profile->user->getRoleNames()[0]=='Agen Perusahaan' || $profile->user->getRoleNames()[0]=='Developer')
                    <img src="{{ asset($profile->qr_code) }}" alt="qr_user" class="img-fluid pl-3 pb-3 rounded">
                @endif
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
                            <div class="card-img-overlay">
                                <span class="badge badge-sm badge-secondary">{{ $prop->property_type }}</span>
                                <span class="badge badge-sm {{ $prop->property_term=='Beli' ? 'badge-secondary' : 'badge-secondary' }}">{{ $prop->property_term=="Beli" ? "Dijual" : $prop->property_term }}</span>
                                @if($prop->property_term=="Beli")
                                    <span class="badge badge-sm {{ $prop->property_condition=='Baru' ? 'badge-secondary' : 'badge-secondary' }}">{{ $prop->property_condition }}</span>
                                @endif
                            </div>
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
                                <a href="{{ url('profile/'.$prop->username) }}" style="z-index: 1;">
                                    <img src="{{ $prop->photo }}" alt="" class="img-fluid rounded mr-2" style="width:3.35rem;">
                                </a>
                                <span class="flex-fill" style="z-index: 1;">
                                    <a href="{{ url('profile/'.$prop->username) }}">
                                        <h5>{{ $prop->fullname }}</h5>
                                    </a>
                                </span>
                                <a href="{{ url('/simulasi_kredit?harga='.$prop->property_price) }}" target="_blank" class="btn btn-default btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Simulasi Kredit" style="width:2.2rem;height:2.2rem;"><i class="fal fa-calculator"></i></a>
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
    <form action="{{ url('profile/toFollow') }}" method="post" id="form-follow">
        @csrf
    </form>
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

@section('page_js_plugins')
<script>
$(document).ready(function(){
    $('#btn-follow').on('click', function(){
        var csrf_token = $('#form-follow > input[name="_token"]').val();
        var id = $(this).attr('data-id');
        var url = "{{ url('profile/toFollow/'.$profile->user->username) }}";
        var current_follower = $('#follower').text();
        $.ajax({
            url: url,
            method:'get',
            data : {_token:csrf_token, id:id},
            success: function(response){
                if(response=="login"){
                    window.location.replace('{{ url("login") }}');
                } else if(response=="added"){
                    $('#btn-follow').html('<span><i class="fas fa-heart text-danger"></i>&nbsp;&nbsp;Unfollow</span>');
                    $('#follower').text(Number(current_follower)+1);
                } else {
                    $('#btn-follow').html('<span><i class="far fa-heart"></i>&nbsp;&nbsp;Follow</span>');
                    $('#follower').text(Number(current_follower)-1);
                }
            }
        });
    });
});
</script>
@endsection
@extends('layouts/app')

@section('content')
<div class="container-fluid bg-default sticky-top">
    <br>
    <form action="{{ url()->full() }}" method="get" id="form-search-bar">
        <div class="d-flex">
            <div class="form-group input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input name="keyword" id="property-search-bar" class="form-control" placeholder="Cari Agen properti terbaik" type="text" <?php if(isset($_GET['keyword']) && $_GET['keyword']!=''){ echo 'value="'.$_GET['keyword'].'"'; } ;?>>
            </div>
            <div class="form-group flex-fill ml-3">
                <button type="submit" class="btn btn-secondary btn-block" style="width:8rem;height:2.8rem;"><i class="fa fas fa-search"></i> Cari</button>
            </div>
        </div>
        <div class="d-flex">
            <!-- <button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#searchModal"><i class="fa fas fa-cog"></i> Pencarian Detail</button> -->
            <div class="" style="witdh:50%">&nbsp;</div>
            <select name="sort" id="property-search-sort" class="form-control selectpicker" data-style="btn-secondary">
                <option value="all" <?php if(isset($_GET['sort']) && $_GET['sort']=='all'){ echo 'selected'; } ;?>>Urutkan</option>
                <option value="Terbaru" <?php if(isset($_GET['sort']) && $_GET['sort']=='Terbaru'){ echo 'selected'; } ;?>>Terbaru</option>
                <option value="AZ" <?php if(isset($_GET['sort']) && $_GET['sort']=='AZ'){ echo 'selected'; } ;?>>A - Z</option>
                <option value="ZA" <?php if(isset($_GET['sort']) && $_GET['sort']=='ZA'){ echo 'selected'; } ;?>>Z - A</option>
            </select>
        </div>
        <br>
    </form>
</div>
<br>
<div class="container-fluid">
    <div class="row justify-content-center">
        @foreach($agen as $ag)
        <div class="col-sm-6 col-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                    <a href="{{ url('profile/'.$ag->username) }}">
                        <img src="{{ $ag->photo }}" alt="agen_photo" class="img-fluid rounded-circle" style="width:10rem;height:10rem;">
                    </a>
                    </div>
                    <div class="flex justify-content-center mt-3">
                        <a href="{{ url('profile/'.$ag->username) }}"><h2>{{ $ag->fullname }}</h2>
                    </div>
                    <div class="flex justify-content-center mt-3">
                        <a href="http://{{ $ag->web_address }}" target="_blank" class="mr-3"><i class="fas fa-globe"></i></a>
                        <a href="https://www.facebook.com/{{ $ag->fb_profile }}" target="_blank" class="mr-3"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.twitter.com/{{ $ag->twitter_profile }}" target="_blank" class="mr-3"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/{{ $ag->ig_profile }}" target="_blank" class="mr-3"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/{{ $ag->linkedin_profile }}" target="_blank" class="mr-3"><i class="fab fa-linkedin"></i></a>
                        <a href="https://www.youtube.com/c/{{ $ag->yt_profile }}" target="_blank" class="mr-3"><i class="fab fa-youtube"></i></a>
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
                <span>{{ $agen->withPath($url)->onEachSide(2)->links() }}</span>
            </div>
            <div class="col-sm-12 col-md-2">
                <span class=""><a href="{{ $url2 }}" class="btn btn-link btn-block">Tampilkan semua</a></span>
            </div>
        @endif
    </div>
    <br>
</div>
<div class="modal fade" id="searchModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Temukan Agen properti terbaik untuk anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('property') }}" method="get">
                    <div class="form-group input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" name="keyword" id="property-search-keyword" placeholder="Cari Hunian terbaik anda" type="text" <?php if(isset($_GET['keyword']) && $_GET['keyword']!=''){ echo 'value="'.$_GET['keyword'].'"'; } ;?>>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-block" style="height:2.7rem;"><i class="fa fas fa-search"></i> Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_js_plugins')
<script>
$(document).ready(function(){
    $('#property-search-bar').on('input', function(){
        var value = $('#property-search-bar').val();
        $('#property-search-keyword').val(value);
        // console.log(value);
    });

    $('#property-search-keyword').on('input', function(){
        var value = $('#property-search-keyword').val();
        $('#property-search-bar').val(value);
        // console.log(value);
    });

    $('#property-search-sort').on('change', function(){
        $('#form-search-bar').submit();
    });
});
</script>
@endsection
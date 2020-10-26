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
                <input name="keyword" id="agen-search-bar" class="form-control" placeholder="Cari Agen properti terbaik" type="text" <?php if(isset($_GET['keyword']) && $_GET['keyword']!=''){ echo 'value="'.$_GET['keyword'].'"'; } ;?>>
            </div>
            <div class="form-group flex-fill ml-3">
                <button type="submit" class="btn btn-secondary btn-block" style="width:8rem;height:2.8rem;"><i class="fa fas fa-search"></i> Cari</button>
            </div>
        </div>
        <div class="d-flex">
        <button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#searchModal"><i class="fa fas fa-cog"></i> Pencarian Detail</button>
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
        @forelse($agen as $ag)
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
                    <div class="flex justify-content-center mt-3">
                        <a href="https://wa.me/62{{ substr($ag->wa_number,1) }}" target="_blank" class="btn btn-slack btn-sm">Whatsapp</a>
                        <a href="{{ 'tel:'.$ag->wa_number }}" class="btn btn-warning btn-sm">Handphone</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <p class="text-disabled display-4">Oops! Agen yang kamu cari belum tersedia.</p>
        @endforelse
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
                <form action="{{ url('agen') }}" method="get">
                    <div class="form-group input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" name="keyword" id="agen-search-keyword" placeholder="Cari Hunian terbaik anda" type="text" <?php if(isset($_GET['keyword']) && $_GET['keyword']!=''){ echo 'value="'.$_GET['keyword'].'"'; } ;?>>
                    </div>
                    <div class="form-group mr-3">
                        <select id="property-search-provinsi" class="form-control select2" data-style="btn-secondary" data-live-search="true" required></select>
                    </div>
                    <div class="form-group mr-3">
                        <select name="location" id="property-search-kabupaten" class="form-control select2" data-style="btn-secondary" data-live-search="true" required></select>
                        <!-- <input type="hidden" name="location" value="#" id="property-search2-location"> -->
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

@section('page_css_plugins')
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> -->
@endsection

@section('page_js_plugins')
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
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
    <?php if(isset($_GET['location'])){
        echo "var locationss = '".$_GET['location']."';";
    } else {
        echo "var locationss = '00.00';";
    }
    ?>
    $.ajax({
        url: URL+'provinsi',
        method : 'GET',
        success : function(response){
            $.each(response, function(index, value){
                if(value.kode==locationss.substring(0,2)){
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
                        if(value.kode==locationss.substring(0,5)){
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
                                if(value.kode==locationss.substring(0,8)){
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
                                        if(value.kode==locationss.substring(0,13)){
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
    widgetlokasi('property-search-provinsi', 'property-search-kabupaten', 'kecamatan', 'kelurahan');

    $('#agen-search-bar').on('input', function(){
        var value = $('#agen-search-bar').val();
        $('#agen-search-keyword').val(value);
        // console.log(value);
    });

    $('#agen-search-keyword').on('input', function(){
        var value = $('#agen-search-keyword').val();
        $('#agen-search-bar').val(value);
        // console.log(value);
    });

    $('#agen-search-sort').on('change', function(){
        $('#form-search-bar').submit();
    });
});
</script>
@endsection
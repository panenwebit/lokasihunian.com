@extends('layouts.app')

@section('content')
<div class="container-fluid bg-default sticky-top">
    <br>
    <form action="{{ url()->full() }}" method="get" id="form-search-bar">
        <div class="d-flex">
            <div class="form-group input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input name="keyword" id="property-search-bar" class="form-control" placeholder="Cari Hunian terbaik anda" type="text" <?php if(isset($_GET['keyword']) && $_GET['keyword']!=''){ echo 'value="'.$_GET['keyword'].'"'; } ;?>>
            </div>
            <div class="form-group flex-fill ml-3">
                <button type="submit" class="btn btn-secondary btn-block" style="width:8rem;height:2.8rem;"><i class="fa fas fa-search"></i> Cari</button>
            </div>
        </div>
        <div class="d-flex">
            <button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#searchModal"><i class="fa fas fa-cog"></i> Pencarian Detail</button>
            <select name="sort" id="property-search-sort" class="form-control selectpicker" data-style="btn-secondary">
                <option value="all" <?php if(isset($_GET['sort']) && $_GET['sort']=='all'){ echo 'selected'; } ;?>>Urutkan</option>
                <option value="Baru" <?php if(isset($_GET['sort']) && $_GET['sort']=='Baru'){ echo 'selected'; } ;?>>Terbaru</option>
                <option value="Murah" <?php if(isset($_GET['sort']) && $_GET['sort']=='Murah'){ echo 'selected'; } ;?>>Harga Termurah</option>
                <option value="Mahal" <?php if(isset($_GET['sort']) && $_GET['sort']=='Mahal'){ echo 'selected'; } ;?>>Harga Termahal</option>
            </select>
        </div>
        <br>
    </form>
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
<div class="modal fade" id="searchModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cari Hunian idaman anda</h5>
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
                    <div class="form-group mr-3">
                        <select name="term" id="property-search-term" class="form-control selectpicker" data-style="btn-secondary">
                            <option value="all" <?php if(isset($_GET['term']) && $_GET['term']=='all'){ echo 'selected'; } ;?>>Beli / Sewa</option>
                            <option value="Beli" <?php if(isset($_GET['term']) && $_GET['term']=='Beli'){ echo 'selected'; } ;?>>Beli</option>
                            <option value="Sewa" <?php if(isset($_GET['term']) && $_GET['term']=='Sewa'){ echo 'selected'; } ;?>>Sewa</option>
                        </select>
                    </div>
                    <div class="form-group mr-3">
                        <select name="condition" id="property-search-condition" class="form-control selectpicker" data-style="btn-secondary">
                            <option value="all" <?php if(isset($_GET['condition']) && $_GET['condition']=='all'){ echo 'selected'; } ;?>>Baru / Bekas</option>
                            <option value="Baru" <?php if(isset($_GET['condition']) && $_GET['condition']=='Baru'){ echo 'selected'; } ;?>>Baru</option>
                            <option value="Bekas" <?php if(isset($_GET['condition']) && $_GET['condition']=='Bekas'){ echo 'selected'; } ;?>>Bekas</option>
                        </select>
                    </div>
                    <div class="form-group mr-3">
                        <select name="type" id="property-search-type" class="form-control selectpicker" data-style="btn-secondary">
                            <option value="all" <?php if(isset($_GET['type']) && $_GET['type']=='all'){ echo 'selected'; } ;?>>Jenis Hunian</option>
                            <option value="Apartemen" <?php if(isset($_GET['type']) && $_GET['type']=='Apartemen'){ echo 'selected'; } ;?>>Apartemen</option>
                            <option value="Rumah" <?php if(isset($_GET['type']) && $_GET['type']=='Rumah'){ echo 'selected'; } ;?>>Rumah</option>
                            <option value="Tanah" <?php if(isset($_GET['type']) && $_GET['type']=='Tanah'){ echo 'selected'; } ;?>>Tanah</option>
                            <option value="Ruko" <?php if(isset($_GET['type']) && $_GET['type']=='Ruko'){ echo 'selected'; } ;?>>Ruko</option>
                            <option value="Vila" <?php if(isset($_GET['type']) && $_GET['type']=='Vila'){ echo 'selected'; } ;?>>Vila</option>
                        </select>
                    </div>
                    <div class="form-group mr-3 row">
                        <div class="col-6">
                            <select name="lprice" id="property-search-lprice" class="form-control selectpicker" data-style="btn-secondary">
                                <option value="all" <?php if(isset($_GET['lprice']) && $_GET['lprice']=='all'){ echo 'selected'; } ;?>>Harga Minimal</option>
                                <option value="50000000" <?php if(isset($_GET['lprice']) && $_GET['lprice']=='50000000'){ echo 'selected'; } ;?>>50 Juta</option>
                                <option value="100000000" <?php if(isset($_GET['lprice']) && $_GET['lprice']=='100000000'){ echo 'selected'; } ;?>>100 Juta</option>
                                <option value="200000000" <?php if(isset($_GET['lprice']) && $_GET['lprice']=='200000000'){ echo 'selected'; } ;?>>200 Juta</option>
                                <option value="500000000" <?php if(isset($_GET['lprice']) && $_GET['lprice']=='500000000'){ echo 'selected'; } ;?>>500 Juta</option>
                                <option value="1000000000" <?php if(isset($_GET['lprice']) && $_GET['lprice']=='1000000000'){ echo 'selected'; } ;?>>1 Milyar</option>
                                <option value="2000000000" <?php if(isset($_GET['lprice']) && $_GET['lprice']=='2000000000'){ echo 'selected'; } ;?>>2 Milyar</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select name="hprice" id="property-search-hprice" class="form-control selectpicker" data-style="btn-secondary">
                                <option value="all" <?php if(isset($_GET['hprice']) && $_GET['hprice']=='all'){ echo 'selected'; } ;?>>Harga Maximal</option>
                                <option value="50000000" <?php if(isset($_GET['hprice']) && $_GET['hprice']=='50000000'){ echo 'selected'; } ;?>>50 Juta</option>
                                <option value="100000000" <?php if(isset($_GET['hprice']) && $_GET['hprice']=='100000000'){ echo 'selected'; } ;?>>100 Juta</option>
                                <option value="200000000" <?php if(isset($_GET['hprice']) && $_GET['hprice']=='200000000'){ echo 'selected'; } ;?>>200 Juta</option>
                                <option value="500000000" <?php if(isset($_GET['hprice']) && $_GET['hprice']=='500000000'){ echo 'selected'; } ;?>>500 Juta</option>
                                <option value="1000000000" <?php if(isset($_GET['hprice']) && $_GET['hprice']=='1000000000'){ echo 'selected'; } ;?>>1 Milyar</option>
                                <option value="2000000000" <?php if(isset($_GET['hprice']) && $_GET['hprice']=='2000000000'){ echo 'selected'; } ;?>>2 Milyar</option>
                            </select>
                        </div>
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
<style>
    /* ::-webkit-scrollbar {
        width: 10rem;
    } */
</style>
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
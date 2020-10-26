@extends('layouts.app')

@section('content')  
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/banner/banner_1.jpg') }}" class="w-100" alt="">
                <div class="container">
                    <div class="carousel-caption text-center">
                        <div class="container bg-default rounded" id="form-search-utama">
                            <br>
                            <form action="{{ url('property') }}" method="get">
                                <div class="d-flex">
                                    <div class="form-group mr-3" style="min-width:10rem;">
                                        <select name="term" id="property-search-term" class="form-control selectpicker" data-style="btn-secondary">
                                            <option value="all">Beli / Sewa</option>
                                            <option value="Beli">Beli</option>
                                            <option value="Sewa">Sewa</option>
                                        </select>
                                    </div>
                                    <div class="form-group input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input class="form-control form-control-black" name="keyword" id="property-search-keyword" placeholder="Cari Hunian terbaik anda" type="text">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="form-group mr-3">
                                        <select name="condition" id="property-search-condition" class="form-control selectpicker" data-style="btn-secondary">
                                            <option value="all">Baru / Bekas</option>
                                            <option value="Baru">Baru</option>
                                            <option value="Bekas">Bekas</option>
                                        </select>
                                    </div>
                                    <div class="form-group mr-3">
                                        <select name="type" id="property-search-type" class="form-control selectpicker" data-style="btn-secondary">
                                            <option value="all">Jenis Hunian</option>
                                            <option value="Apartemen">Apartemen</option>
                                            <option value="Rumah">Rumah</option>
                                            <option value="Tanah">Tanah</option>
                                            <option value="Ruko">Ruko</option>
                                            <option value="Vila">Vila</option>
                                            <option value="Gudang">Gudang</option>
                                            <option value="Pabrik">Pabrik</option>
                                            <option value="Kantor">Kantor</option>
                                            <option value="Toko">Toko</option>
                                            <option value="Stand">Stand</option>
                                            <option value="Gedung">Gedung</option>
                                            <option value="Hotel">Hotel</option>
                                        </select>
                                    </div>
                                    <div class="form-group mr-3">
                                        <select name="lprice" id="property-search-lprice" class="form-control selectpicker" data-style="btn-secondary">
                                            <option value="all">Harga Minimal</option>
                                            <option value="50000000">50 Juta</option>
                                            <option value="100000000">100 Juta</option>
                                            <option value="200000000">200 Juta</option>
                                            <option value="500000000">500 Juta</option>
                                            <option value="1000000000">1 Milyar</option>
                                            <option value="2000000000">2 Milyar</option>
                                        </select>
                                    </div>
                                    <div class="form-group mr-3">
                                        <select name="hprice" id="property-search-hprice" class="form-control selectpicker" data-style="btn-secondary">
                                            <option value="all">Harga Maximal</option>
                                            <option value="50000000">50 Juta</option>
                                            <option value="100000000">100 Juta</option>
                                            <option value="200000000">200 Juta</option>
                                            <option value="500000000">500 Juta</option>
                                            <option value="1000000000">1 Milyar</option>
                                            <option value="2000000000">2 Milyar</option>
                                        </select>
                                    </div>
                                    <div class="form-group flex-fill">
                                        <button type="submit" class="btn btn-secondary btn-block" style="height:2.7rem;"><i class="fa fas fa-search"></i> Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="container rounded" id="form-search-secondary">
                            <button type="button" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#searchModal">
                                <i class="fa fas fa-search"></i> &nbsp; Cari Hunian idaman anda
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid">
        <h2 class="text-center">Property Terbaru</h2>
        <br>
        <div class="row justify-content-center">
            @foreach($property as $prop)
            <div class="col-sm-6 col-md-4">
                <div class="card shadow">
                    <a href="{{ url('property/'.$prop->property_slug) }}">
                        <img src="{{ asset('assets/img/rumah/rumah_1.jpg') }}" alt="" class="card-img-top">
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
                            <h5><a href="{{ url('property/something') }}">{{ $prop->property_title }}</a></h5>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p><small><i class="fal fa-building"></i> {{ $prop->property_building_area }} m<sup>2</sup></small></p>
                            <p><small><i class="fal fa-arrows"></i> {{ $prop->property_surface_area }} m<sup>2</sup></small></p>
                            <p><small><i class="fal fa-bed"></i> {{ $prop->property_bedroom_count }} </small></p>
                            <p><small><i class="fal fa-bath"></i> {{ $prop->property_bathroom_count }} </small></p>
                            <p><small><i class="fal fa-parking-circle"></i> {{ $prop->property_parking_count }} </small></p>
                        </div>
                        <div class="d-flex">
                            <h3>Rp. {{ number_format($prop->property_price,0, ',', '.') }}</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ url('profile/'.$prop->user->username) }}" style="z-index: 1;">
                                <img src="{{ $prop->user->profile->photo }}" alt="" class="img-fluid rounded mr-2" style="width:3.35rem;">
                            </a>
                            <span class="flex-fill" style="z-index: 1;">
                                <h5><a href="{{ url('profile/'.$prop->user->username) }}">{{ $prop->user->profile->fullname }}</a></h5>
                            </span>
                            <a href="{{ url('/simulasi_kredit?harga='.$prop->property_price) }}" target="_blank" class="btn btn-default btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Simulasi Kredit" style="width:2.2rem;height:2.2rem;"><i class="fal fa-calculator"></i></a>
                            <a href="https://wa.me/62{{ substr($prop->user->profile->wa_number,1) }}" target="_blank" class="btn btn-slack btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Whatsapp Agen" style="width:2.2rem;height:2.2rem;"><i class="fab fa-whatsapp"></i></a>
                            <a href="tel:{{ $prop->user->profile->wa_number }}" class="btn btn-warning btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Hubungi Agen" style="width:2.2rem;height:2.2rem;"><i class="fas fa-phone"></i></a>
                        </div>

                        <!-- <a href="{{ url('property') }}" class="stretched-link"></a> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="{{ url('/property') }}" class="btn btn-default btn-pill">Lihat lebih banyak</a>
        </div>
        <br>
    </div>
    <!-- <div class="parlax"></div> -->

    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-sm-12 col-md-6 mb-3">
                <img src="{{ asset('assets/img/banner/banner_pertanyaan.jpg') }}" alt="" class="img-fluid">
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <a href="{{ url('property') }}">
                    <img src="{{ asset('assets/img/banner/banner_temukan.jpg') }}" alt="" class="img-fluid">
                </a>
            </div>
        </div>
        
        <div class="rounded" style="background-color:#f1f1f1;color:#000;">
            <br>
            <h2 class="text-center">Hunian Strategis</h2>
            <br>
            <div class="row justify-content-around">
                @foreach($top_locations as $top_location)
                    <div class="col-sm-6 col-md-3">
                        <div class="pl-5 mb-4"><a href="{{ url('property?location='.$top_location->location) }}">Properti di {{ $top_location->location_name }}</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="parlax"></div>
    <!-- <div class="container px-5">
        <h2 class="text-center my-4">Artikel Terbaru</h2>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="card shadow">
                    <img src="{{ asset('assets/img/rumah/rumah_1.jpg') }}" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <h5 class="flex-fill">15 Tips memilih hunian yang tepat untuk anda</h5>
                        </div>
                        <div class="d-flex">
                            <a href="#">Readmore</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
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
                        <input class="form-control" name="keyword" id="properti-search2-keyword" placeholder="Cari Hunian terbaik anda" type="text">
                    </div>
                    <div class="form-group mr-3">
                        <select name="term" id="property-search2-term" class="form-control selectpicker" data-style="btn-secondary">
                            <option value="all">Beli / Sewa</option>
                            <option value="Beli">Beli</option>
                            <option value="Sewa">Sewa</option>
                        </select>
                    </div>
                    <div class="form-group mr-3">
                        <select name="condition" id="property-search2-condition" class="form-control selectpicker" data-style="btn-secondary">
                            <option value="all">Baru / Bekas</option>
                            <option value="Baru">Baru</option>
                            <option value="Bekas">Bekas</option>
                        </select>
                    </div>
                    <div class="form-group mr-3">
                        <select name="type" id="property-search2-type" class="form-control selectpicker" data-style="btn-secondary">
                            <option value="all">Jenis Hunian</option>
                            <option value="Apartemen">Apartemen</option>
                            <option value="Rumah">Rumah</option>
                            <option value="Tanah">Tanah</option>
                            <option value="Ruko">Ruko</option>
                            <option value="Vila">Vila</option>
                            <option value="Gudang">Gudang</option>
                            <option value="Pabrik">Pabrik</option>
                            <option value="Kantor">Kantor</option>
                            <option value="Toko">Toko</option>
                            <option value="Stand">Stand</option>
                            <option value="Gedung">Gedung</option>
                            <option value="Hotel">Hotel</option>
                        </select>
                    </div>
                    <div class="form-group mr-3">
                        <select id="property-search2-provinsi" class="form-control select2" required></select>
                    </div>
                    <div class="form-group mr-3">
                        <select name="location" id="property-search2-kabupaten" class="form-control select2" required></select>
                        <!-- <input type="hidden" name="location" value="#" id="property-search2-location"> -->
                    </div>
                    <div class="form-group mr-3 row">
                        <div class="col-6">
                            <select name="lprice" id="property-search2-lprice" class="form-control selectpicker" data-style="btn-secondary">
                                <option value="all">Harga Minimal</option>
                                <option value="50000000">50 Juta</option>
                                <option value="100000000">100 Juta</option>
                                <option value="200000000">200 Juta</option>
                                <option value="500000000">500 Juta</option>
                                <option value="1000000000">1 Milyar</option>
                                <option value="2000000000">2 Milyar</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select name="hprice" id="property-search2-hprice" class="form-control selectpicker" data-style="btn-secondary">
                                <option value="all">Harga Maximal</option>
                                <option value="50000000">50 Juta</option>
                                <option value="100000000">100 Juta</option>
                                <option value="200000000">200 Juta</option>
                                <option value="500000000">500 Juta</option>
                                <option value="1000000000">1 Milyar</option>
                                <option value="2000000000">2 Milyar</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-block" style="height:2.7rem;"><i class="fa fas fa-search"></i> Search</button>
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
<script src="{{ asset('assets/js/widget_lokasi.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
        widgetlokasi('property-search2-provinsi', 'property-search2-kabupaten', 'kecamatan', 'kelurahan');
    });
</script>
@endsection
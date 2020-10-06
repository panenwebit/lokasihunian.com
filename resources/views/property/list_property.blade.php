@extends('layouts.app')

@section('content')
<div class="container-fluid bg-default sticky-top">
    <br>
    <form action="{{ url('property') }}" method="get">
        <div class="d-flex">
            <div class="form-group input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Cari Hunian terbaik anda" type="text">
            </div>
            <div class="form-group flex-fill ml-3">
                <button type="submit" class="btn btn-secondary btn-block" style="height:2.8rem;"><i class="fa fas fa-search"></i> Search</button>
            </div>
        </div>
        <div class="d-flex">
            <div class="form-group mr-3" style="min-width:10rem;">
                <select name="term" id="property-search-term" class="form-control selectpicker" data-style="btn-secondary">
                    <option value="all">Beli / Sewa</option>
                    <option value="Beli">Beli</option>
                    <option value="Sewa">Sewa</option>
                </select>
            </div>
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
                    <option value="all">Harga Maksimal</option>
                    <option value="50000000">50 Juta</option>
                    <option value="100000000">100 Juta</option>
                    <option value="200000000">200 Juta</option>
                    <option value="500000000">500 Juta</option>
                    <option value="1000000000">1 Milyar</option>
                    <option value="2000000000">2 Milyar</option>
                </select>
            </div>

            <!-- sort -->
            <div class="form-group mr-3 ml-auto">
                <select name="" id="" class="form-control selectpicker" data-style="btn-secondary">
                    <option value="#">Terbaru</option>
                    <option value="#">Harga Termurah</option>
                    <option value="#">Harga Termahal</option>
                </select>
            </div>
        </div>
    </form>
</div>

<br>

<div class="container-fluid">
    <div class="row justify-content-center">
        @foreach($property as $prop)
        <div class="col-sm-6 col-md-4">
            <div class="card shadow">
                <a href="{{ url('property/'.$prop->property_slug) }}">
                    <img src="{{ asset('assets/img/rumah/dummy/'.$prop->images) }}" alt="" class="card-img-top">
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
                        <button type="button" class="btn btn-default btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Simulasi Kredit" style="width:2.5rem;height:2.5rem;"><i class="fal fa-calculator"></i></button>
                        <a href="https://wa.me/62{{ substr($prop->wa_number,1) }}" target="_blank" class="btn btn-slack btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Whatsapp Agen" style="width:2.5rem;height:2.5rem;"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        
    </div>
    <br>
</div>
@endsection

@section('page_css_plugins')
<style>
    /* ::-webkit-scrollbar {
        width: 10rem;
    } */
</style>
@endsection
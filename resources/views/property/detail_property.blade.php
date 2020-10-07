@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-2">
            <div class="text-center">
                <a  data-fancybox="gallery" href="{{ asset($property->propertyImage[0]['images']) }}">
                    <img src="{{ asset($property->propertyImage[0]['images']) }}" alt="" class="img-fluid w-50">
                </a>
            </div>
            <div class="d-flex">
            @foreach($property->propertyImage as $prop)
                @if(!$loop->first)
                    <a data-fancybox="gallery" href="{{ asset($prop->images) }}"><img src="{{ asset($prop->images) }}" class="img-fluid rounded mr-3 hidden" style="width:15rem;height:10rem;"></a>
                @endif
            @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-fill">
                                <h1 class="mb-0">{{ $property->property_title }}</h1>
                                <h2 class="mb-0">Rp. {{ number_format($property->property_price,0,',', '.') }}</h2>
                            </div>
                            <div class="d-flex">
                                <button type="button" class="btn btn-default btn-icon-only" style="height:2.5rem;width:2.5rem;"><i class="far fa-map"></i></button>
                            </div>
                        </div>
                        <div class="d-flex">
                            <p><i class="far fa-map-marker-alt"></i>&nbsp;{{ $property->propertyLocation() }}</p>
                        </div>
                        
                        <div class="row my-3" >
                            <div class="col-4">
                                <p class="mr-2"><i class="fal fa-arrows"></i>&nbsp;Luas Tanah : {{ $property->property_surface_area }} m<sup>2</sup></p>
                                <p class="mr-2"><i class="fal fa-building"></i>&nbsp;Luas Bangunan : {{ $property->property_building_area }} m<sup>2</sup></p>
                            </div>
                            <div class="col-4">
                                <p class="mr-2"><i class="fal fa-bed"></i>&nbsp;Kamar Tidur : {{ $property->property_bedroom_count }} </p>
                                <p class="mr-2"><i class="fal fa-bath"></i>&nbsp;Kamar Mandi : {{ $property->property_bathroom_count }} </p>
                            </div>
                            <p class="mr-1"><i class="fal fa-parking-circle"></i>&nbsp;Area Parkir : {{ $property->property_parking_count }} </p>
                        </div>

                        <p>{{ $property->property_description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ $property->user->profile->photo }}" class="rounded-circle mr-2" style="width:5rem;" alt="">
                            <h3>{{ $property->user->profile->fullname }}</h3>
                        </div>
                        <div class=" mt-3">
                            <a href="" class="btn btn btn-slack btn-block btn-sm"><i class="fab fa-whatsapp fa-2x"></i>&nbsp;&nbsp;Whatsapp</a>
                            <a href="" class="btn btn btn-warning btn-block btn-sm"><i class="fas fa-phone-alt fa-2x"></i>&nbsp;&nbsp;Hubungi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
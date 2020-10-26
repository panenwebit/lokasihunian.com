@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-2">
            <div class="text-center">
                <a data-fancybox="gallery" href="{{ asset($property->propertyImage[0]['images']) }}">
                    <img src="{{ asset($property->propertyImage[0]['images']) }}" alt="" class="img-fluid w-50">
                    <!-- <button type="button" class="btn btn-secondary btn-sm" style="position:absolute;"><i class="far fa-camera"></i></button> -->
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
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-fill">
                                <h2 class="my-1">{{ substr($property->property_title,0, 59) }}</h2>
                                <h3 class="mb-0">Rp. {{ number_format($property->property_price,0,',', '.') }}</h3>
                            </div>
                            <div class="d-flex">
                                <!-- <button type="button" class="btn btn-secondary btn-icon-only" style="height:2.5rem;width:2.5rem;" data-toggle="tooltip" data-placement="top" title="Photo"><i class="far fa-images"></i>&nbsp;{{ $property->propertyImage->count() }}</button>
                                <button type="button" class="btn btn-secondary btn-icon-only" style="height:2.5rem;width:2.5rem;" data-toggle="tooltip" data-placement="top" title="Maps"><i class="far fa-map"></i></button> -->
                                @if($isFavorite)
                                    <button type="button" id="btn-favorite" class="btn btn-secondary btn-icon-only" style="height:2.5rem;width:2.5rem;" data-toggle="tooltip" data-placement="top" title="Hapus dari Favorit" data-id="{{ $property->id }}"><i class="fas fa-star text-primary"></i></button>
                                @else
                                    <button type="button" id="btn-favorite" class="btn btn-secondary btn-icon-only" style="height:2.5rem;width:2.5rem;" data-toggle="tooltip" data-placement="top" title="Tambahkan ke Favorit" data-id="{{ $property->id }}"><i class="far fa-star"></i></button>
                                @endif
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
                <div class="card shadow">
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
    <form action="{{ url('property/toFavorites') }}" method="post" id="form-favorite">
        @csrf
    </form>
@endsection

@section('page_js_plugins')
<script>
$(document).ready(function(){
    $('#btn-favorite').on('click', function(){
        var csrf_token = $('#form-favorite > input[name="_token"]').val();
        var id = $(this).attr('data-id');
        var url = "{{ url('property/toFavorites/'.$property->id) }}";
        $.ajax({
            url: url,
            method:'get',
            data : {_token:csrf_token, id:id},
            success: function(response){
                if(response=="login"){
                    window.location.replace('{{ url("login") }}');
                } else if(response=="added"){
                    $('#btn-favorite').html('<i class="fas fa-star text-primary"></i>');
                    $('#btn-favorite').removeAttr('title');
                    $('#btn-favorite').attr('title', 'Hapus dari Favorite');
                } else {
                    $('#btn-favorite').html('<i class="far fa-star"></i>');
                    $('#btn-favorite').removeAttr('title');
                    $('#btn-favorite').attr('title', 'Tambahkan ke Favorite');
                }
            }
        });
        // alert(''+csrf_token);
    });
});
</script>
@endsection
@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <a  data-fancybox="gallery" href="{{ asset('assets/img/rumah/rumah_1.jpg') }}">
            <img src="{{ asset('assets/img/rumah/rumah_1.jpg') }}" alt="" class="img-fluid w-100">
        </a>

        <!-- <a data-fancybox="gallery" href="{{ asset('assets/img/rumah/rumah_1.jpg') }}"><img src="{{ asset('assets/img/rumah/rumah_1.jpg') }}" class="img-fluid rounded" style="width:15rem;height:10rem;"></a> -->
        <a data-fancybox="gallery" href="{{ asset('assets/img/rumah/rumah_2.jpg') }}"><img src="{{ asset('assets/img/rumah/rumah_2.jpg') }}" class="img-fluid rounded" style="width:15rem;height:10rem;"></a>
        <a data-fancybox="gallery" href="{{ asset('assets/img/rumah/rumah_3.jpg') }}"><img src="{{ asset('assets/img/rumah/rumah_3.jpg') }}" class="img-fluid rounded" style="width:15rem;height:10rem;"></a>
        <br>
        <div class="d-flex">
            <h2 class="flex-fill">{{ $property->property_title }}</h2>
            <h2>Rp. 1.500.000.000</h2>
        </div>
    </div>
    <br>
@endsection
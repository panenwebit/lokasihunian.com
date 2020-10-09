@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">PAKET</h3>
                <p class="text-sm mb-0">
                    Ini adalah paket Membership (keanggotaan) yang tersedia pada website lokasihunian.com . <br>
                </p>
            </div>
        </div>
        <div class="row justifiy-content-center">
            @foreach($packages as $package)
                <div class="col-md-3">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <h3 class="">{{  $package->name  }}</h3>
                            <h1 class="display-4">Rp. {{  number_format($package->price, 0, ',', '.') }}</h1>
                            <hr class="mt-0">
                            <p class="text-sm">{{  $package->limit_listing }} Listing Online / Aktif</p>
                            <p class="text-sm">{{  $package->limit_unggulan  }} Listing Unggulan</p>
                            <p class="text-sm">{{  $package->limit_photo_per_listing   }} Foto / Listing</p>
                            <hr class="mt-0">
                            <a href="{{ url('dashboard/package/edit/'.$package->id) }}" class="">Edit</a>&nbsp;
                            @if(!$loop->first)
                            |&nbsp;&nbsp;<a href="{{ url('dashboard/package/delete/'.$package->id) }}" class="delete" data-paket="{{ $package->id }}">Hapus</a>
                            @endif
                        </div>
                    </div>    
                </div>
            @endforeach
        </div>
    </div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h1 id="id"></h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_js_plugins')
<script>
    $(document).ready(function(){
        $('.delete').on('click', function(e){
            $('#id').html($(this).attr('data-paket'));
        });
    });
</script>
@endsection
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
                            @can('Edit-Paket')
                                <a href="{{ url('dashboard/package/edit/'.$package->id) }}" class="">Edit</a>&nbsp;
                            @endcan
                            @if(!$loop->first)
                                @can('Delete-Paket')
                                    |&nbsp;&nbsp;<a href="#" data-id="{{ $package->id }}" class="delete" data-paket="{{ $package->id }}">Hapus</a>
                                @endcan
                            @endif
                        </div>
                    </div>    
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('page_js_plugins')
<script>
$(document).ready(function(){
    $('.delete').click(function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var pesan = "Apakah anda sudah yakin akan menghapus paket berikut?";
        bootbox.confirm({
            message: pesan,
            locale: "id",
            buttons: {
                confirm : {
                    className:'btn-default',
                }, 
                cancel :{
                    className:'btn-secondary',
                }
            },
            callback: function(result){
                if(result){
                    window.location.href='{{ url("dashboard/package/delete") }}'+'/'+id;
                } else {
                    // alert('a');
                }
            }
        });
    }); 
});
</script>
@endsection
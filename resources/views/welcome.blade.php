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
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-4">
                <div class="card shadow">
                    <a href="{{ url('property/something') }}">
                        <img src="{{ asset('assets/img/rumah/rumah_1.jpg') }}" alt="" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <div class="d-flex">
                            <h5><a href="{{ url('property/something') }}">RUMAH DIJUAL KOMPLEK MEWAH SAN DIEGO PAKUWON CITY</a></h5>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p><small><i class="fal fa-building"></i> 300 m<sup>2</sup></small></p>
                            <p><small><i class="fal fa-arrows"></i> 300 m<sup>2</sup></small></p>
                            <p><small><i class="fal fa-bed"></i> 4 </small></p>
                            <p><small><i class="fal fa-bath"></i> 2 </small></p>
                            <p><small><i class="fal fa-parking-circle"></i> 1 </small></p>
                        </div>
                        <div class="d-flex">
                            <h3>Rp. 1.500.000.000</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ url('profile/something') }}">
                                <img src="{{ asset('assets/img/agen/agent_2.jpg') }}" alt="" class="img-fluid rounded mr-2" style="width:3.35rem;">
                            </a>
                            <span class="flex-fill">
                                <h5><a href="{{ url('profile/something') }}">Jonathan Alexandro</a></h5>
                            </span>
                            <button type="button" class="btn btn-default btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Simulasi Kredit" style="width:2.5rem;height:2.5rem;"><i class="fal fa-calculator"></i></button>
                            <button type="button" class="btn btn-slack btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Whatsapp Agen" style="width:2.2rem;height:2.2rem;"><i class="fab fa-whatsapp"></i></button>
                            <button type="button" class="btn btn-warning btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Whatsapp Agen" style="width:2.0rem;height:2.0rem;"><i class="fas fa-phone"></i></button>
                        </div>

                        <!-- <a href="{{ url('property') }}" class="stretched-link"></a> -->
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="card shadow">
                    <img src="{{ asset('assets/img/rumah/rumah_1.jpg') }}" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="d-flex">
                            <h5>RUMAH DIJUAL KOMPLEK MEWAH SAN DIEGO PAKUWON CITY</h5>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p><small><i class="fal fa-building"></i> 300 m<sup>2</sup></small></p>
                            <p><small><i class="fal fa-arrows"></i> 300 m<sup>2</sup></small></p>
                            <p><small><i class="fal fa-bed"></i> 4 </small></p>
                            <p><small><i class="fal fa-bath"></i> 2 </small></p>
                            <p><small><i class="fal fa-parking-circle"></i> 1 </small></p>
                        </div>
                        <div class="d-flex">
                            <h3>Rp. 1.500.000.000</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/agen/agent_2.jpg') }}" alt="" class="img-fluid rounded mr-2" style="width:3.35rem;">
                            <span class="flex-fill">
                                <h5>Jonathan Alexandro</h5>
                            </span>
                            <button type="button" class="btn btn-default btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Simulasi Kredit" style="width:2.5rem;height:2.5rem;"><i class="fal fa-calculator"></i></button>
                            <button type="button" class="btn btn-slack btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Whatsapp Agen" style="width:2.5rem;height:2.5rem;"><i class="fab fa-whatsapp"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="card shadow">
                    <img src="{{ asset('assets/img/rumah/rumah_1.jpg') }}" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="d-flex">
                            <h5>RUMAH DIJUAL KOMPLEK MEWAH SAN DIEGO PAKUWON CITY</h5>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p><small><i class="fal fa-building"></i> 300 m<sup>2</sup></small></p>
                            <p><small><i class="fal fa-arrows"></i> 300 m<sup>2</sup></small></p>
                            <p><small><i class="fal fa-bed"></i> 4 </small></p>
                            <p><small><i class="fal fa-bath"></i> 2 </small></p>
                            <p><small><i class="fal fa-parking-circle"></i> 1 </small></p>
                        </div>
                        <div class="d-flex">
                            <h3>Rp. 1.500.000.000</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/agen/agent_2.jpg') }}" alt="" class="img-fluid rounded mr-2" style="width:3.35rem;">
                            <span class="flex-fill">
                                <h5>Jonathan Alexandro</h5>
                            </span>
                            <button type="button" class="btn btn-default btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Simulasi Kredit" style="width:2.5rem;height:2.5rem;"><i class="fal fa-calculator"></i></button>
                            <button type="button" class="btn btn-slack btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Whatsapp Agen" style="width:2.5rem;height:2.5rem;"><i class="fab fa-whatsapp"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="card shadow">
                    <img src="{{ asset('assets/img/rumah/rumah_1.jpg') }}" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="d-flex">
                            <h5>RUMAH DIJUAL KOMPLEK MEWAH SAN DIEGO PAKUWON CITY</h5>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p><small><i class="fal fa-building"></i> 300 m<sup>2</sup></small></p>
                            <p><small><i class="fal fa-arrows"></i> 300 m<sup>2</sup></small></p>
                            <p><small><i class="fal fa-bed"></i> 4 </small></p>
                            <p><small><i class="fal fa-bath"></i> 2 </small></p>
                            <p><small><i class="fal fa-parking-circle"></i> 1 </small></p>
                        </div>
                        <div class="d-flex">
                            <h3>Rp. 1.500.000.000</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/agen/agent_2.jpg') }}" alt="" class="img-fluid rounded mr-2" style="width:3.35rem;">
                            <span class="flex-fill">
                                <h5>Jonathan Alexandro</h5>
                            </span>
                            <button type="button" class="btn btn-default btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Simulasi Kredit" style="width:2.5rem;height:2.5rem;"><i class="fal fa-calculator"></i></button>
                            <button type="button" class="btn btn-slack btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Whatsapp Agen" style="width:2.5rem;height:2.5rem;"><i class="fab fa-whatsapp"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="card shadow">
                    <img src="{{ asset('assets/img/rumah/rumah_1.jpg') }}" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="d-flex">
                            <h5>RUMAH DIJUAL KOMPLEK MEWAH SAN DIEGO PAKUWON CITY</h5>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p><small><i class="fal fa-building"></i> 300 m<sup>2</sup></small></p>
                            <p><small><i class="fal fa-arrows"></i> 300 m<sup>2</sup></small></p>
                            <p><small><i class="fal fa-bed"></i> 4 </small></p>
                            <p><small><i class="fal fa-bath"></i> 2 </small></p>
                            <p><small><i class="fal fa-parking-circle"></i> 1 </small></p>
                        </div>
                        <div class="d-flex">
                            <h3>Rp. 1.500.000.000</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/agen/agent_2.jpg') }}" alt="" class="img-fluid rounded mr-2" style="width:3.35rem;">
                            <span class="flex-fill">
                                <h5>Jonathan Alexandro</h5>
                            </span>
                            <button type="button" class="btn btn-default btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Simulasi Kredit" style="width:2.5rem;height:2.5rem;"><i class="fal fa-calculator"></i></button>
                            <button type="button" class="btn btn-slack btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Whatsapp Agen" style="width:2.5rem;height:2.5rem;"><i class="fab fa-whatsapp"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="card shadow">
                    <img src="{{ asset('assets/img/rumah/rumah_1.jpg') }}" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="d-flex">
                            <h5>RUMAH DIJUAL KOMPLEK MEWAH SAN DIEGO PAKUWON CITY</h5>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p><small><i class="fal fa-building"></i> 300 m<sup>2</sup></small></p>
                            <p><small><i class="fal fa-arrows"></i> 300 m<sup>2</sup></small></p>
                            <p><small><i class="fal fa-bed"></i> 4 </small></p>
                            <p><small><i class="fal fa-bath"></i> 2 </small></p>
                            <p><small><i class="fal fa-parking-circle"></i> 1 </small></p>
                        </div>
                        <div class="d-flex">
                            <h3>Rp. 1.500.000.000</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/agen/agent_2.jpg') }}" alt="" class="img-fluid rounded mr-2" style="width:3.35rem;">
                            <span class="flex-fill">
                                <h5>Jonathan Alexandro</h5>
                            </span>
                            <button type="button" class="btn btn-default btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Simulasi Kredit" style="width:2.5rem;height:2.5rem;"><i class="fal fa-calculator"></i></button>
                            <button type="button" class="btn btn-slack btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Whatsapp Agen" style="width:2.5rem;height:2.5rem;"><i class="fab fa-whatsapp"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="parlax"></div> -->

    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-sm-12 col-md-6 mb-3">
                <img src="{{ asset('assets/img/banner/banner_pertanyaan.jpg') }}" alt="" class="img-fluid">
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <img src="{{ asset('assets/img/banner/banner_temukan.jpg') }}" alt="" class="img-fluid">
            </div>
        </div>
        
        <div class="rounded" style="background-color:#f1f1f1;color:#000;">
            <br>
            <h2 class="text-center">Hunian Strategis</h2>
            <br>
            <div class="row justify-content-around">
                <div class="col-sm-6 col-md-3">
                    <div class="pl-5 mb-4"><a href="#">Properti di DKI Jakarta</a></div>
                    <div class="pl-5 mb-4"><a href="#">Properti di Bali</a></div>
                    <div class="pl-5 mb-4"><a href="#">Properti di Bandung</a></div>
                    <div class="pl-5 mb-4"><a href="#">Properti di Banten</a></div>
                    <div class="pl-5 mb-4"><a href="#">Properti di Depok</a></div>
                </div>
                <div class="col-sm-6 col-md 3">
                    <div class="pl-5 mb-4"><a href="#">Properti di Tanggerang</a></div>
                    <div class="pl-5 mb-4"><a href="#">Properti di Daerah Istimewa Yogyakarta</a></div>
                    <div class="pl-5 mb-4"><a href="#">Properti di Semarang</a></div>
                    <div class="pl-5 mb-4"><a href="#">Properti di Surabaya</a></div>
                    <div class="pl-5 mb-4"><a href="#">Properti di Bekasi</a></div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="pl-5 mb-4"><a href="#">Properti di DKI Jakarta</a></div>
                    <div class="pl-5 mb-4"><a href="#">Properti di Bali</a></div>
                    <div class="pl-5 mb-4"><a href="#">Properti di Bandung</a></div>
                    <div class="pl-5 mb-4"><a href="#">Properti di Banten</a></div>
                    <div class="pl-5 mb-4"><a href="#">Properti di Depok</a></div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="pl-5 mb-4"><a href="#">Properti di Tanggerang</a></div>
                    <div class="pl-5 mb-4"><a href="#">Properti di Daerah Istimewa Yogyakarta</a></div>
                    <div class="pl-5 mb-4"><a href="#">Properti di Semarang</a></div>
                    <div class="pl-5 mb-4"><a href="#">Properti di Surabaya</a></div>
                    <div class="pl-5 mb-4"><a href="#">Properti di Bekasi</a></div>
                </div>
            </div>
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
                        </select>
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

@section('page_js_plugins')
<script>
    $(document).ready(function(){
        // $('#property-search-lprice').on('change', function(){
        //     var lprice = $('#property-search-lprice').val();
        //     var hprice = $('#property-search-hprice').val();
        //     if(lprice!='all'){
        //         if(lprice > hprice){
        //             $("#property-search-hprice > option").each(function() {
        //                 if(this.value > lprice){
        //                     $('#property-search-hprice option').removeAttr('selected');
        //                     $('#property-search-hprice option').text(this.text);
        //                     $('#property-search-hprice option[value='+this.value+']').attr('selected','selected');
        //                 }
        //             });
        //         }
        //     }
        // });
    });
</script>
@endsection
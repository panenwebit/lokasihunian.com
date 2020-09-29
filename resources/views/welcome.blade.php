@extends('layouts.app')

@section('content')  
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="">
        <!-- <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol> -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777" /></svg> -->
                <img src="{{ asset('assets/img/banner/banner_1.jpg') }}" class="w-100" alt="">
                <div class="container">
                    <div class="carousel-caption text-center">
                        <div class="container bg-default rounded" id="form-search-utama">
                            <br>
                            <form action="#" method="get">
                                <div class="d-flex">
                                    <div class="form-group mr-3" style="min-width:10rem;">
                                        <select name="" id="" class="form-control selectpicker" data-style="btn-secondary">
                                            <option value="#">Beli / Sewa</option>
                                            <option value="#">Beli</option>
                                            <option value="#">Sewa</option>
                                        </select>
                                    </div>
                                    <div class="form-group input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Cari Hunian terbaik anda" type="text">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="form-group mr-3">
                                        <select name="" id="" class="form-control selectpicker" data-style="btn-secondary">
                                            <option value="#">Baru / Bekas</option>
                                            <option value="#">Baru</option>
                                            <option value="#">Bekas</option>
                                        </select>
                                    </div>
                                    <div class="form-group mr-3">
                                        <select name="" id="" class="form-control selectpicker" data-style="btn-secondary">
                                            <option value="#">Jenis Hunian</option>
                                            <option value="#">Apartemen</option>
                                            <option value="#">Rumah</option>
                                            <option value="#">Tanah</option>
                                            <option value="#">Ruko</option>
                                            <option value="#">Vila</option>
                                        </select>
                                    </div>
                                    <div class="form-group mr-3">
                                        <select name="" id="" class="form-control selectpicker" data-style="btn-secondary">
                                            <option value="#">Harga Minimal</option>
                                            <option value="#">50 Juta</option>
                                            <option value="#">100 Juta</option>
                                            <option value="#">200 Juta</option>
                                            <option value="#">500 Juta</option>
                                            <option value="#">1 Milyar</option>
                                            <option value="#">2 Milyar</option>
                                        </select>
                                    </div>
                                    <div class="form-group mr-3">
                                        <select name="" id="" class="form-control selectpicker" data-style="btn-secondary">
                                            <option value="#">Harga Maksimal</option>
                                            <option value="#">50 Juta</option>
                                            <option value="#">100 Juta</option>
                                            <option value="#">200 Juta</option>
                                            <option value="#">500 Juta</option>
                                            <option value="#">1 Milyar</option>
                                            <option value="#">2 Milyar+</option>
                                        </select>
                                    </div>
                                    <div class="form-group flex-fill">
                                        <button type="button" class="btn btn-secondary btn-block" style="height:2.7rem;"><i class="fa fas fa-search"></i> Search</button>
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
        <!-- <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a> -->
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
                            <button type="button" class="btn btn-slack btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Whatsapp Agen" style="width:2.5rem;height:2.5rem;"><i class="fab fa-whatsapp"></i></button>
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
        <h2 class="text-center my-4">Hunian Strategis</h2>
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
                <form action="#" method="get">
                    <div class="form-group input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" placeholder="Cari Hunian terbaik anda" type="text">
                    </div>
                    <div class="form-group mr-3">
                        <select name="" id="" class="form-control selectpicker" data-style="btn-secondary">
                            <option value="#">Beli / Sewa</option>
                            <option value="#">Beli</option>
                            <option value="#">Sewa</option>
                        </select>
                    </div>
                    <div class="form-group mr-3">
                        <select name="" id="" class="form-control selectpicker" data-style="btn-secondary">
                            <option value="#">Baru / Bekas</option>
                            <option value="#">Baru</option>
                            <option value="#">Bekas</option>
                        </select>
                    </div>
                    <div class="form-group mr-3">
                        <select name="" id="" class="form-control selectpicker" data-style="btn-secondary">
                            <option value="#">Jenis Hunian</option>
                            <option value="#">Apartemen</option>
                            <option value="#">Rumah</option>
                            <option value="#">Tanah</option>
                            <option value="#">Ruko</option>
                            <option value="#">Vila</option>
                        </select>
                    </div>
                    <div class="form-group mr-3 row">
                        <div class="col-6">
                            <select name="" id="" class="form-control selectpicker" data-style="btn-secondary">
                                <option value="#">Harga Minimal</option>
                                <option value="#">50 Juta</option>
                                <option value="#">100 Juta</option>
                                <option value="#">200 Juta</option>
                                <option value="#">500 Juta</option>
                                <option value="#">1 Milyar</option>
                                <option value="#">2 Milyar</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select name="" id="" class="form-control selectpicker" data-style="btn-secondary">
                                <option value="#">Harga Maksimal</option>
                                <option value="#">50 Juta</option>
                                <option value="#">100 Juta</option>
                                <option value="#">200 Juta</option>
                                <option value="#">500 Juta</option>
                                <option value="#">1 Milyar</option>
                                <option value="#">2 Milyar+</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-default btn-block" style="height:2.7rem;"><i class="fa fas fa-search"></i> Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

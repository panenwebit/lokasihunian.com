@extends('layouts.app')

@section('content')
<div class="container-fluid bg-default sticky-top">
    <br>
    <form action="#" method="get">
        <div class="d-flex">
            <div class="form-group input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Cari Hunian terbaik anda" type="text">
            </div>
            <div class="form-group flex-fill ml-3">
                <button type="button" class="btn btn-secondary btn-block" style="height:2.8rem;"><i class="fa fas fa-search"></i> Search</button>
            </div>
        </div>
        <div class="d-flex">
            <div class="form-group mr-3" style="min-width:10rem;">
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
@endsection
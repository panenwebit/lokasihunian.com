@extends('layouts.dashboard')

@section('content')
    <!-- <br> -->
    <div class="container">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Pengajuan Listing</h3>
                <p class="text-sm mb-0">
                    Ini adalah formulir untuk pengajuan listing property pada website lokasihunian.com. <br>
                    Pengajuan anda akan ditinjau lebih lanjut oleh admin kami.
                </p>
            </div>
        </div>
        <form action="{{ url('property/listing') }}" method="post">
            @csrf
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-heading"></i></span>
                </div>
                <input type="text" name="property_title" id="property_title" class="form-control @error('property_title') is-invalid @enderror" placeholder="Judul Property" value="{{ old('property_title') }}" required>
                @error('property_title')
                    <span class="invalid-feedback register-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-city"></i></span>
                        </div>
                        <select name="property_type" id="property_type" class="form-control" required>
                            <option value="Apartemen">Apartemen</option>
                            <option value="Rumah">Rumah</option>
                            <option value="Tanah">Tanah</option>
                            <option value="Ruko">Ruko</option>
                            <option value="Vila">Vila</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-money-check-edit"></i></span>
                        </div>
                        <select name="property_term" id="property_term" class="form-control" required>
                            <option value="Beli">Jual</option>
                            <option value="Sewa">Sewa</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-newspaper"></i></span>
                        </div>
                        <select name="property_condition" id="property_condition" class="form-control" required>
                            <option value="Baru">Baru</option>
                            <option value="Bekas">Bekas</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-money-bill-alt"></i></span>
                        </div>
                        <input type="number" min="1" step="1" name="property_price" id="property_price" class="form-control" placeholder="Harga Property" required>
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-arrows-alt"></i></span>
                        </div>
                        <input type="number" min="1" step="1" name="property_surface_area" id="property_surface_area" class="form-control" placeholder="Luas Tanah" required>
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-building"></i></span>
                        </div>
                        <input type="number" min="1" step="1" name="property_building_area" id="property_building_area" class="form-control" placeholder="Luas Bangunan" required>
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-bed"></i></span>
                        </div>
                        <input type="number" min="0" step="1" name="property_bedroom_count" id="property_bedroom_count" class="form-control" placeholder="Jumlah Kamar Tidur" required>
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-bath"></i></span>
                        </div>
                        <input type="number" min="0" step="1" name="property_bathroom_count" id="property_bathroom_count" class="form-control" placeholder="Jumlah Kamar Mandi" required>
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-parking-circle"></i></span>
                        </div>
                        <input type="number" min="0" step="1" name="property_parking_count" id="property_parking_count" class="form-control" placeholder="Jumlah Area Parkir" required>
                    </div>
                </div>
            </div>
            
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-home"></i></span>
                </div>
                <textarea name="property_address" id="property_address" cols="30" rows="3" class="form-control" placeholder="Alamat Property" required></textarea>
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend col-md-1">
                    <span class="input-group-text"><i class="fa far fa-home"></i>&nbsp;&nbsp;<i class="fa far fa-map-marker-alt"></i></span>
                </div>
                <div class="col-sm-12 col-md-5 mb-3">
                    <select name="property_provinsi" id="property_provinsi" class="form-control select2" required></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="property_kabupaten" id="property_kabupaten" class="form-control select2" required></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="property_kecamatan" id="property_kecamatan" class="form-control select2" required></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="property_kelurahan" id="property_kelurahan" class="form-control select2" required></select>
                </div>
            </div>

            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-info-circle"></i></span>
                </div>
                <textarea name="property_description" id="property_description" class="form-control" cols="30" rows="5" placeholder="Deskripsi" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default btn-block">Ajukan Listing</button>
            </div>
        </form>
    </div>
    <br>
    <br>
    <br>
@endsection
@section('page_css_plugins')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('page_js_plugins')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/js/widget_lokasi.js') }}"></script>
    <script>
        $('.select2').select2();
        $(document).ready(function(){
            widgetlokasi('property_provinsi', 'property_kabupaten', 'property_kecamatan', 'property_kelurahan');
        });
    </script>
@endsection
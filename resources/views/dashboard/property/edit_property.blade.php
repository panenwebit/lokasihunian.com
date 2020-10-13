@extends('layouts.dashboard')

@section('content')
    <!-- <br> -->
    <div class="container">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Edit Listing</h3>
                <p class="text-sm mb-0">
                    Ini adalah formulir untuk memperbarui listing property pada website lokasihunian.com. <br>
                    Perubahan yang anda lakukan akan ditinjau lebih lanjut oleh admin kami.
                </p>
            </div>
        </div>

        <form action="{{ url('dashboard/property/listing') }}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $property->id }}" readonly>
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-heading"></i></span>
                </div>
                <input type="text" name="property_title" id="property_title" class="form-control @error('property_title') is-invalid @enderror" placeholder="Judul Property" value="{{ $property->property_title }}" required>
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
                        <select name="property_type" id="property_type" class="form-control selectpicker" data-style="btn-secondary" required>
                            <option value="Apartemen" <?php if($property->property_type=="Apartemen") { echo 'selected'; } ?>>Apartemen</option>
                            <option value="Rumah" <?php if($property->property_type=="Rumah") { echo 'selected'; } ?>>Rumah</option>
                            <option value="Tanah" <?php if($property->property_type=="Tanah") { echo 'selected'; } ?>>Tanah</option>
                            <option value="Ruko" <?php if($property->property_type=="Ruko") { echo 'selected'; } ?>>Ruko</option>
                            <option value="Vila" <?php if($property->property_type=="Vila") { echo 'selected'; } ?>>Vila</option>
                            <option value="Gudang" <?php if($property->property_type=="Gedung") { echo 'selected'; } ?>>Gudang</option>
                            <option value="Pabrik" <?php if($property->property_type=="Pabrik") { echo 'selected'; } ?>>Pabrik</option>
                            <option value="Kantor" <?php if($property->property_type=="Kantor") { echo 'selected'; } ?>>Kantor</option>
                            <option value="Toko" <?php if($property->property_type=="Toko") { echo 'selected'; } ?>>Toko</option>
                            <option value="Stand" <?php if($property->property_type=="Stand") { echo 'selected'; } ?>>Stand</option>
                            <option value="Gedung" <?php if($property->property_type=="Gedung") { echo 'selected'; } ?>>Gedung</option>
                            <option value="Hotel" <?php if($property->property_type=="Hotel") { echo 'selected'; } ?>>Hotel</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-money-check-edit"></i></span>
                        </div>
                        <select name="property_term" id="property_term" class="form-control selectpicker" data-style="btn-secondary" required>
                            <option value="Beli" <?php if($property->property_term=="Beli") { echo 'selected'; } ?>>Jual</option>
                            <option value="Sewa" <?php if($property->property_term=="Sewa") { echo 'selected'; } ?>>Sewa</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-newspaper"></i></span>
                        </div>
                        <select name="property_condition" id="property_condition" class="form-control selectpicker" data-style="btn-secondary" required>
                            <option value="Baru" <?php if($property->property_condition=="Baru") { echo 'selected'; } ?>>Baru</option>
                            <option value="Bekas" <?php if($property->property_condition=="Bekas") { echo 'selected'; } ?>>Bekas</option>
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
                        <input type="number" min="1" step="1" name="property_price" id="property_price" class="form-control" placeholder="Harga Property" value="{{ $property->property_price }}" required>
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-arrows-alt"></i></span>
                        </div>
                        <input type="number" min="1" step="1" name="property_surface_area" id="property_surface_area" class="form-control" placeholder="Luas Tanah" value="{{ $property->property_surface_area }}" required>
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-building"></i></span>
                        </div>
                        <input type="number" min="1" step="1" name="property_building_area" id="property_building_area" class="form-control" placeholder="Luas Bangunan" value="{{ $property->property_building_area }}" required>
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-bed"></i></span>
                        </div>
                        <input type="number" min="0" step="1" name="property_bedroom_count" id="property_bedroom_count" class="form-control" placeholder="Jumlah Kamar Tidur" value="{{ $property->property_bedroom_count }}" required>
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-bath"></i></span>
                        </div>
                        <input type="number" min="0" step="1" name="property_bathroom_count" id="property_bathroom_count" class="form-control" placeholder="Jumlah Kamar Mandi" value="{{ $property->property_bathroom_count }}" required>
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-parking-circle"></i></span>
                        </div>
                        <input type="number" min="0" step="1" name="property_parking_count" id="property_parking_count" class="form-control" placeholder="Jumlah Area Parkir" value="{{ $property->property_parking_count }}" required>
                    </div>
                </div>
            </div>
            
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-home"></i></span>
                </div>
                <textarea name="property_address" id="property_address" cols="30" rows="3" class="form-control" placeholder="Alamat Property" required>{{ $property->property_address }}</textarea>
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend col-md-1">
                    <span class="input-group-text"><i class="fa far fa-home"></i>&nbsp;&nbsp;<i class="fa far fa-map-marker-alt"></i></span>
                </div>
                <div class="col-sm-12 col-md-5 mb-3">
                    <label for="provinsi">Provinsi</label>
                    <select name="property_provinsi" id="property_provinsi" class="form-control select2" required></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="kabupaten">Kabupaten</label>
                    <select name="property_kabupaten" id="property_kabupaten" class="form-control select2" required></select>
                </div>
                <div class="input-group-prepend col-md-1">
                    <!-- <span class="input-group-text"><i class="fa far fa-home"></i>&nbsp;&nbsp;<i class="fa far fa-map-marker-alt"></i></span> -->
                </div>
                <div class="col-sm-12 col-md-5 mb-3">
                    <label for="kecamatan">Kecamatan</label>
                    <select name="property_kecamatan" id="property_kecamatan" class="form-control select2" required></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="kelurahan">Kelurahan</label>
                    <select name="property_kelurahan" id="property_kelurahan" class="form-control select2" required></select>
                </div>
            </div>

            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-info-circle"></i></span>
                </div>
                <textarea name="property_description" id="property_description" class="form-control" cols="30" rows="5" placeholder="Deskripsi" required>{{ $property->property_description }}</textarea>
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
<script>
function widgetlokasi(SelectorProvinsi, SelectorKabupaten, SelectorKecamatan, SelectorKelurahan, URL=false){
    if(URL==false){
        URL = 'http://127.0.0.1:8000/api/lokasi/';
    }

    var SelectorProvinsi = $('#'+SelectorProvinsi);
    var SelectorKabupaten = $('#'+SelectorKabupaten);
    var SelectorKecamatan = $('#'+SelectorKecamatan);
    var SelectorKelurahan = $('#'+SelectorKelurahan);

    var html_provinsi = '';
    $.ajax({
        url: URL+'provinsi',
        method : 'GET',
        success : function(response){
            $.each(response, function(index, value){
                if(value.kode=="{{ substr($property->property_location,0,2) }}"){
                    html_provinsi += '<option value="'+value.kode+'" selected>'+value.wilayah+'</option>';
                } else {
                    html_provinsi += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                }
            });
            SelectorProvinsi.html(html_provinsi);
            var html_kabupaten = '';
            var provinsi = SelectorProvinsi.val();
            $.ajax({
                url: URL+'kabupaten',
                data: {provinsi : provinsi},
                method : 'GET',
                success : function(response){
                    $.each(response, function(index, value){
                        if(value.kode=="{{ substr($property->property_location,0,5) }}"){
                            html_kabupaten += '<option value="'+value.kode+'" selected>'+value.wilayah+'</option>';
                        } else {
                            html_kabupaten += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                        }
                    });
                    SelectorKabupaten.html(html_kabupaten);
                    var html_kecamatan = '';
                    var kabupaten = SelectorKabupaten.val();
                    $.ajax({
                        url: URL+'kecamatan',
                        data: {kabupaten : kabupaten},
                        method : 'GET',
                        success : function(response){
                            $.each(response, function(index, value){
                                if(value.kode=="{{ substr($property->property_location,0,8) }}"){
                                    html_kecamatan += '<option value="'+value.kode+'" selected>'+value.wilayah+'</option>';
                                } else {
                                    html_kecamatan += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                                }
                            });
                            SelectorKecamatan.html(html_kecamatan);
                            var html_kelurahan = '';
                            var kecamatan = SelectorKecamatan.val();
                            $.ajax({
                                url: URL+'kelurahan',
                                data: {kecamatan : kecamatan},
                                method : 'GET',
                                success : function(response){
                                    $.each(response, function(index, value){
                                        if(value.kode=="{{ substr($property->property_location,0,13) }}"){
                                            html_kelurahan += '<option value="'+value.kode+'" selected>'+value.wilayah+'</option>';
                                        } else {
                                            html_kelurahan += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                                        }
                                    });
                                    SelectorKelurahan.html(html_kelurahan);
                                },
                            });
                        },
                    });
                },
            });
        },
    });

    SelectorProvinsi.on('change', function(){
        var html_kabupaten = '';
        var provinsi = SelectorProvinsi.val();
        $.ajax({
            url: URL+'kabupaten',
            data: {provinsi : provinsi},
            method : 'GET',
            success : function(response){
                $.each(response, function(index, value){
                    html_kabupaten += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                });
                SelectorKabupaten.html(html_kabupaten);
                var html_kecamatan = '';
                var kabupaten = SelectorKabupaten.val();
                $.ajax({
                    url: URL+'kecamatan',
                    data: {kabupaten : kabupaten},
                    method : 'GET',
                    success : function(response){
                        $.each(response, function(index, value){
                            html_kecamatan += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                        });
                        SelectorKecamatan.html(html_kecamatan);
                        var html_kelurahan = '';
                        var kecamatan = SelectorKecamatan.val();
                        $.ajax({
                            url: URL+'kelurahan',
                            data: {kecamatan : kecamatan},
                            method : 'GET',
                            success : function(response){
                                $.each(response, function(index, value){
                                    html_kelurahan += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                                });
                                SelectorKelurahan.html(html_kelurahan);
                            },
                        });
                    },
                });
            },
        });
    });

    SelectorKabupaten.on('change', function(){
        var html_kecamatan = '';
        var kabupaten = SelectorKabupaten.val();
        $.ajax({
            url: URL+'kecamatan',
            data: {kabupaten : kabupaten},
            method : 'GET',
            success : function(response){
                $.each(response, function(index, value){
                    html_kecamatan += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                });
                SelectorKecamatan.html(html_kecamatan);
                var html_kelurahan = '';
                var kecamatan = SelectorKecamatan.val();
                $.ajax({
                    url: URL+'kelurahan',
                    data: {kecamatan : kecamatan},
                    method : 'GET',
                    success : function(response){
                        $.each(response, function(index, value){
                            html_kelurahan += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                        });
                        SelectorKelurahan.html(html_kelurahan);
                    },
                });
            },
        });
    });

    SelectorKecamatan.on('change', function(){
        var html_kelurahan = '';
        var kecamatan = SelectorKecamatan.val();
        $.ajax({
            url: URL+'kelurahan',
            data: {kecamatan : kecamatan},
            method : 'GET',
            success : function(response){
                $.each(response, function(index, value){
                    html_kelurahan += '<option value="'+value.kode+'">'+value.wilayah+'</option>';
                });
                SelectorKelurahan.html(html_kelurahan);
            },
        });
    });
}
</script>
    <script>
        $('.select2').select2();
        $(document).ready(function(){
            widgetlokasi('property_provinsi', 'property_kabupaten', 'property_kecamatan', 'property_kelurahan');
        });
    </script>
@endsection
@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <form action="{{ url('property/buat_listing') }}" method="post">

            <div class="form-group">
                <input type="text" name="property_title" id="property_title" class="form-control" placeholder="Judul Property" required>
            </div>
            <div class="form-group">
                <input type="number" min="1" step="1" name="property_price" id="property_price" class="form-control" placeholder="Harga Property" required>
            </div>
            <div class="form-group">
                <textarea name="property_description" id="property_description" class="form-control" cols="30" rows="5" placeholder="Deskripsi" required></textarea>
            </div>
            <div class="form-group">
                <select name="property_term" id="property_term" class="form-control" required>
                    <option value="">Jual</option>
                    <option value="">Sewa</option>
                </select>
            </div>
            <div class="form-group">
                <select name="property_condition" id="property_condition" class="form-control" required>
                    <option value="">Baru</option>
                    <option value="">Bekas</option>
                </select>
            </div>
            <div class="form-group">
                <select name="property_type" id="property_type" class="form-control" required>
                    <option value="">Apartemen</option>
                    <option value="">Rumah</option>
                    <option value="">Tanah</option>
                    <option value="">Ruko</option>
                    <option value="">Vila</option>
                </select>
            </div>
            <div class="form-group">
                <input type="number" min="1" step="1" name="property_surface_area" id="property_surface_area" class="form-control" placeholder="Luas Tanah" required>
            </div>
            <div class="form-group">
                <input type="number" min="1" step="1" name="property_building_area" id="property_building_area" class="form-control" placeholder="Luas Bangunan" required>
            </div>
            <div class="form-group">
                <input type="number" min="1" step="1" name="property_bedroom_count" id="property_bedroom_count" class="form-control" placeholder="Jumlah Kamar Tidur" required>
            </div>
            <div class="form-group">
                <input type="number" min="1" step="1" name="property_bathroom_count" id="property_bathroom_count" class="form-control" placeholder="Jumlah Kamar Mandi" required>
            </div>
            <div class="form-group">
                <input type="number" min="1" step="1" name="property_parking_count" id="property_parking_count" class="form-control" placeholder="Jumlah Area Parkir" required>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="property_feature_1" name="property_feature_1">
                        <label class="custom-control-label" for="property_feature_1">Check this custom checkbox</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="property_feature_2" name="property_feature_2">
                        <label class="custom-control-label" for="property_feature_2">Check this custom checkbox</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="property_feature_2" name="property_feature_2">
                        <label class="custom-control-label" for="property_feature_2">Check this custom checkbox</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="property_feature_2" name="property_feature_2">
                        <label class="custom-control-label" for="property_feature_2">Check this custom checkbox</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="property_feature_2" name="property_feature_2">
                        <label class="custom-control-label" for="property_feature_2">Check this custom checkbox</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="property_feature_2" name="property_feature_2">
                        <label class="custom-control-label" for="property_feature_2">Check this custom checkbox</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="property_feature_2" name="property_feature_2">
                        <label class="custom-control-label" for="property_feature_2">Check this custom checkbox</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="property_feature_2" name="property_feature_2">
                        <label class="custom-control-label" for="property_feature_2">Check this custom checkbox</label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <textarea name="property_address" id="property_address" cols="30" rows="3" class="form-control" placeholder="Alamat Property" required></textarea>
            </div>
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend col-md-1">
                    <span class="input-group-text"><i class="fa far fa-home"></i>&nbsp;&nbsp;<i class="fa far fa-map-marker-alt"></i></span>
                </div>
                <div class="col-sm-12 col-md-5 mb-3">
                    <select name="address_provinsi" id="create_profile_address_provinsi" class="form-control select2" required></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="address_kabupaten" id="create_profile_address_kabupaten" class="form-control select2" required></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="address_kecamatan" id="create_profile_address_kecamatan" class="form-control select2" required></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <select name="address_kelurahan" id="create_profile_address_kelurahan" class="form-control select2" required></select>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default btn-block">Ajukan Listing</button>
            </div>
        </form>
    </div>
@endsection
@section('page_css_plugins')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection

@section('page_js_plugins')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/js/widget_lokasi.js') }}"></script>
    <script>
        $('.select2').select2();
        $(document).ready(function(){
            widgetlokasi('create_profile_address_provinsi', 'create_profile_address_kabupaten', 'create_profile_address_kecamatan', 'create_profile_address_kelurahan');
        });
    </script>
@endsection
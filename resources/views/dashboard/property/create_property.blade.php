@extends('layouts.dashboard')

@section('content')
    @if($package->limit_listing > count(auth()->user()->property))
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

        <!-- <form action="{{ url('dashboard/property/listing/images') }}" method="post" class="dropzone mb-3" id="drop" style="flex-direction:row;overflow-x: scroll;">
            @csrf
            <div class="fallback">
                <input type="file" name="property_image" multiple>
            </div>
        </form> -->

        <form action="{{ url('dashboard/property/listing') }}" method="post" id="form-property" enctype="multipart/form-data">
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
                        <select name="property_type" id="property_type" class="form-control selectpicker" data-style="btn-secondary" required>
                            <option value="Apartemen">Apartemen</option>
                            <option value="Rumah">Rumah</option>
                            <option value="Tanah">Tanah</option>
                            <option value="Ruko">Ruko</option>
                            <option value="Vila">Vila</option>
                            <option value="Gudang">Gudang</option>
                            <option value="Pabrik">Pabrik</option>
                            <option value="Kantor">Kantor</option>
                            <option value="Toko">Toko</option>
                            <option value="Stand">Stand</option>
                            <option value="Gedung">Gedung</option>
                            <option value="Hotel">Hotel</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-money-check-edit"></i></span>
                        </div>
                        <select name="property_term" id="property_term" class="form-control selectpicker" data-style="btn-secondary" required>
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
                        <select name="property_condition" id="property_condition" class="form-control selectpicker" data-style="btn-secondary" required>
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
                        <input type="number" min="1" step="1" name="property_price" id="property_price" class="form-control @error('property_price') is-invalid @enderror" placeholder="Harga Property" value="{{ old('property_price') }}" required>
                        @error('property_price')
                            <span class="invalid-feedback register-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-arrows-alt"></i></span>
                        </div>
                        <input type="number" min="1" step="1" name="property_surface_area" id="property_surface_area" class="form-control @error('property_surface_area') is-invalid @enderror" placeholder="Luas Tanah"  value="{{ old('property_surface_area') }}" required>
                        @error('property_surface_area')
                            <span class="invalid-feedback register-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-building"></i></span>
                        </div>
                        <input type="number" min="1" step="1" name="property_building_area" id="property_building_area" class="form-control @error('property_building_area') is-invalid @enderror" placeholder="Luas Bangunan" value="{{ old('property_building_area') }}" required>
                        @error('property_building_area')
                            <span class="invalid-feedback register-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-bed"></i></span>
                        </div>
                        <input type="number" min="0" step="1" name="property_bedroom_count" id="property_bedroom_count" class="form-control @error('property_bedroom_count') is-invalid @enderror" placeholder="Jumlah Kamar Tidur" value="{{ old('property_bedroom_count') }}" required>
                        @error('property_bedroom_count')
                            <span class="invalid-feedback register-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-bath"></i></span>
                        </div>
                        <input type="number" min="0" step="1" name="property_bathroom_count" id="property_bathroom_count" class="form-control @error('property_bathroom_count') is-invalid @enderror" placeholder="Jumlah Kamar Mandi" value="{{ old('property_bathroom_count') }}" required>
                        @error('property_bathroom_count')
                            <span class="invalid-feedback register-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 mb-1">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-parking-circle"></i></span>
                        </div>
                        <input type="number" min="0" step="1" name="property_parking_count" id="property_parking_count" class="form-control @error('property_parking_count') is-invalid @enderror" placeholder="Jumlah Area Parkir" value="{{ old('property_parking_count') }}" required>
                        @error('property_parking_count')
                            <span class="invalid-feedback register-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-home"></i></span>
                </div>
                <textarea name="property_address" id="property_address" cols="30" rows="3" class="form-control @error('property_address') is-invalid @enderror" placeholder="Alamat Property" required>{{ old('property_address') }}</textarea>
                @error('property_address')
                    <span class="invalid-feedback register-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
                </div>
                <div class="col-sm-12 col-md-5 mb-3">
                    <label for="kecamatan">Kecamatan</label>
                    <select name="property_kecamatan" id="property_kecamatan" class="form-control select2" required></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="Kelurahan">Kelurahan</label>
                    <select name="property_kelurahan" id="property_kelurahan" class="form-control select2" required></select>
                </div>
            </div>

            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-info-circle"></i></span>
                </div>
                <textarea name="property_description" id="property_description" class="form-control @error('property_description') is-invalid @enderror" cols="30" rows="5" placeholder="Deskripsi" required>{{ old('property_description') }}</textarea>
                @error('property_description')
                    <span class="invalid-feedback register-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group field_wrap">
                <label for="property_image">Foto Properti</label>
                <div class="input_field_wrap d-flex" style="overflow-x:scroll;">
                    <label class="mr-3" id="image0">
                        <div class="row">
                            <div class="col">
                                <img src="{{ asset('assets/img/banner/add_photo.jpg') }}" alt="property_image" id="property_preview0" class="rounded property_image" style="width:15rem;height:10rem;">
                                <input type="file" name="property_image[]" accept="image/jpeg, image/png" onchange="previewImage(this, 0);">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col text-center">
                                <button type="button" class="btn btn-sm btn-danger btn-delete-image-0 delete-image hidden" img-id="0"><i class="far fa-times"></i></button>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default btn-block" id="btn-submit">Ajukan Listing</button>
            </div>
        </form>
    </div>
    @endif
    <br>
    <br>
    <br>
    
@endsection
@section('page_css_plugins')
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/dropzonejs/dropzone.css') }}"> -->
    <style>
        input[type="file"] {
            display: none;
        }
    </style>
@endsection

@section('page_js_plugins')
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> -->
    <!-- <script src="{{ asset('assets/dropzonejs/min/dropzone.min.js') }}"></script> -->
    <script src="{{ asset('assets/js/widget_lokasi.js') }}"></script>
    <script>
        $('.select2').select2();
        $(document).ready(function(){
            widgetlokasi('property_provinsi', 'property_kabupaten', 'property_kecamatan', 'property_kelurahan');
        });
        
        var max_photo = 10;
        var field_wrap = $('.field_wrap');
        var input_field = $('.input_field_wrap');
        var add_button = $('.btn-add-image');
        var x = 0;i=0;
        function previewImage(input, container) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#property_preview'+container).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string

                $('.btn-delete-image-'+container).removeClass('hidden');
            }

            if(container==i){
                if(x < max_photo) {
                    x++;
                    i++;
                    var html = '';
                    html+='<label class="mr-3" id="image'+i+'">';
                    html+='     <div class="row">';
                    html+='         <div class="col">';
                    html+='             <img src="{{ asset("assets/img/banner/add_photo.jpg") }}" alt="property_image" id="property_preview'+i+'" class="rounded property_image" style="width:15rem;height:10rem;">';
                    html+='             <input type="file" name="property_image[]" accept="image/jpeg, image/png" onchange="previewImage(this, '+i+');">';
                    html+='         </div>';
                    html+='     </div>';
                    html+='     <div class="row mt-2">';
                    html+='         <div class="col text-center">';
                    html+='             <button type="button" class="btn btn-sm btn-danger btn-delete-image-'+i+' delete-image hidden" img-id="'+i+'"><i class="far fa-times"></i></button>';
                    html+='         </div>';
                    html+='     </div>';
                    html+='</label>';
                    $(input_field).prepend(html);
                    // input_field.scrollTop = input_field.scrollWidth;
                }
            }
        }

        $(field_wrap).on('click', '.delete-image', function(e){
            var imgid = $(this).attr('img-id'); 
            e.preventDefault();
            x--;
            $('#image'+imgid).remove();
        });

        $('#btn-submit').click(function(e){
            e.preventDefault();
            if(x<1){
                var pesan = "Listing harus memiliki setidaknya 1 foto, silahkan menambahkan foto properti pada tempat yang telah disediakan.";
                bootbox.alert({
                    message: pesan,
                    locale: 'id',
                });
            } else {
                var pesan = "Apakah anda sudah yakin akan mendaftarkan listing berikut?";
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
                            $('#form-property').submit();
                        } else {
                            // alert('a');
                        }
                    }
                });
            }
        });
        
        // Dropzone.autoDiscover = false;
        // var myDropzone = new Dropzone("#drop", { 
        //     url: "{{ url('property/listing/images') }}",
        //     acceptedFiles : "image/png, image/jpeg",
        //     autoProcessQueue : false,
        //     addRemoveLinks : true,
        //     maxFiles : {{ $package->limit_photo_per_listing }},
        //     dictDefaultMessage : "klik untuk menambahkan gambar untuk property anda. <br> gambar paling awal akan digunakan sebagai thumbnail / gambar utama.",
        // });
    </script>
    <script>
        // CKEDITOR.replace('editor1');
    </script>
@endsection
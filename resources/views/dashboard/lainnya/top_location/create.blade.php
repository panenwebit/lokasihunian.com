@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Form Lokasi Strategis</h3>
            <p class="text-sm mb-0">
                Ini adalah form yang digunakan untuk menambahkan kota strategis pada website lokasihunian.com . <br>
            </p>
        </div>
    </div>

    <form action="{{ url('dashboard/top_location') }}" method="post">
        @csrf
        
        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="col-sm-12 col-md-5 mb-3">
                    <label for="provinsi">Provinsi</label>
                    <select name="provinsi" id="provinsi" class="form-control select2 @error('location') is-invalid @enderror" required></select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="kabupaten">Kabupaten / Kota</label>
                    <select name="location" id="kabupaten" class="form-control select2 @error('location') is-invalid @enderror" required></select>
                    @error('location')
                    <span class="invalid-feedback register-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
        </div>

        <input type="hidden" name="nama_lokasi" value="#" id="nama_lokasi">

        <div class="form-group">
            <button type="submit" class="btn btn-default btn-block">Simpan Lokasi</button>
        </div>
    </form>
</div>
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
            widgetlokasi('provinsi', 'kabupaten', 'kecamatan', 'kelurahan');
        });

        setInterval(function() {
            var selectedText = $("#kabupaten option:selected").html();
            $('#nama_lokasi').val(selectedText);
        }, 500);

        $('#kabupaten').on('change', function(){
            var selectedText = $("#kabupaten option:selected").html();
            $('#nama_lokasi').val(selectedText);
            // alert(selectedText);
        });
    </script>
@endsection
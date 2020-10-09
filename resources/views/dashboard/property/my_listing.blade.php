@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Daftar Listing Property - {{ $status ? $status : 'All'}}</h3>
            <p class="text-sm mb-0">
                Ini adalah tabel yang menampilkan seluruh listing yang telah Anda ajukan.
            </p>
        </div>
        <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Condition</th>
                        <th>Term</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($property as $prop)
                    <tr>
                        <td>{{ $prop->property_title }}</td>
                        <td>{{ $prop->property_type }}</td>
                        <td>{{ $prop->property_condition }}</td>
                        <td>{{ $prop->property_term }}</td>
                        <td>{{ $prop->username }}</td>
                        <td>{{ $prop->property_status }}</td>
                        <td>
                            <a href="{{ url('property/'.$prop->property_slug) }}" target="_blank" class="btn btn-info btn-icon-only btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Property"><i class="far fa-info"></i></a>
                            <a href="{{ url('dashboard/property/listing/edit/'.$prop->id) }}" target="_blank" class="btn btn-warning btn-icon-only btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Detail"><i class="far fa-edit"></i></a>
                            <a href="{{ url('dashboard/property/listing/edit/'.$prop->id) }}" target="_blank" class="btn btn-warning btn-icon-only btn-sm" data-toggle="tooltip" data-placement="top" title="Arsipkan"><i class="far fa-cabinet-filing"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('page_css_plugins')
    <link rel="stylesheet" href="{{ asset('assets/argon/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/argon/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/argon/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection

@section('page_js_plugins')
    <script src="{{ asset('assets/argon/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/argon/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/argon/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/argon/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/argon/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/argon/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/argon/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/argon/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script> -->
@endsection
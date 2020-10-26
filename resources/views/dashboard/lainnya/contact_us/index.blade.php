@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Hubungi Kami</h3>
                <p class="text-sm mb-0">
                    Ini adalah tempat tertampungnya pertanyaan, kritik dan saran yang diajukan oleh pengunjung website lokasihunian.com melalui form hubungi kami. <br>
                </p>
            </div>
            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                            <th>Status</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($publics as $pub)
                        <tr class="<?php if($pub->status=='New'){ echo 'bg-success text-dark'; } ?>">
                            <td>{{ $pub->status }}</td>
                            <td>{{ $pub->id }}</td>
                            <td>{{ $pub->name }}</td>
                            <td>{{ $pub->email }}</td>
                            <td>
                                <a href="{{ url('dashboard/public/hubungi_kami/'.$pub->id) }}" class="btn btn-sm btn-icon-only btn-info" data-toggle="tooltip" title="Lihat Detail"><i class="far fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Daftar Permissions</h3>
            <p class="text-sm mb-0">
                Ini adalah tabel yang menampilkan seluruh Permissions (izin akses) tiap Role (Peran) pengguna yang terdaftar. <br>
                Diskusikan dengan Tim IT untuk mengatur bagian ini.
            </p>
        </div>
        <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                    <tr>
                        <th>id</th>
                        <th>Permissions</th>
                        <th>Guard</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
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
    <script src="{{ asset('assets/argon/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
@endsection
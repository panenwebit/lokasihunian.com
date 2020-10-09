@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Daftar Peran & Izin Akses</h3>
            <p class="text-sm mb-0">
                Ini adalah tabel yang menampilkan seluruh Roles (Peran) yang tersedia untuk pengguna yang terdaftar. <br>
                Diskusikan dengan tim IT untuk mengatur bagian ini.
            </p>
        </div>
        <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Role (Peran)</th>
                        <th>Permissions (Izin Akses)</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach($role->getAllPermissions() as $permission)
                                <span class="badge badge-success">{{ $permission->name }}</span>&nbsp;
                            @endforeach
                        </td>
                        <td>
                            <!-- <a href="{{ url('dashboard/setting/role/edit/'.$role->name) }}" class="btn btn-warning btn-icon-only btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Role"><i class="far fa-user-cog"></i></a> -->
                            <a href="{{ url('dashboard/setting/role_permission/edit/'.$role->name) }}" class="btn btn-warning btn-icon-only btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Permission"><i class="far fa-tools"></i></a>
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
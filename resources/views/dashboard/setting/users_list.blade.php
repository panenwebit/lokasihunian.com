@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Daftar Pengguna</h3>
            <p class="text-sm mb-0">
                Ini adalah tabel yang menampilkan seluruh pengguna yang terdaftar.
            </p>
        </div>
        <div class="card-body">
            <a href="{{ url('dashboard/setting/users/new_intern') }}" class="btn btn-default btn-sm">Tambah Pengguna Internal</a>
        </div>
        <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Terdaftar pada</th>
                        <th>Roles (Peran)</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>
                            @if($user->email_verified_at!='')
                                <i class="far fa-check-circle text-success"></i>
                            @else
                                <i class="far fa-question-circle text-warning"></i>
                            @endif
                            &nbsp;{{ $user->email }}
                        </td>
                        <td>{{ date('d-m-Y ( H:i:s )', strtotime($user->created_at)) }}</td>
                        <td>
                            @foreach($user->getRoleNames() as $role)
                                <span class="badge badge-default">{{ $role }}</span>&nbsp;
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ url('profile/'.$user->username) }}" target="_blank" class="btn btn-info btn-icon-only btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Profil"><i class="far fa-info"></i></a>
                            @if($user->getRoleNames()[0]!='Owner')
                                @can('Setting-Users')
                                    <a href="{{ url('dashboard/setting/user_role/edit/'.$user->username) }}" class="btn btn-warning btn-icon-only btn-sm" data-toggle="tooltip" data-placement="top" title="Atur Peran"><i class="far fa-user-cog"></i></a>
                                @endcan
                            @endif
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
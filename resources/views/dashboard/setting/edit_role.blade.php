@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Edit Role (Peran)</h3>
                <p class="text-sm mb-0">
                    Atur peran dan hak akses pada website lokasihunian.com . <br>
                </p>
            </div>
        </div>
        <form action="{{ url('dashboard/setting/role') }}" method="post">
            @csrf
            @method('PATCH')
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-user"></i></span>
                </div>
                <input type="hidden" name="old_role" value="{{ $role->name }}" readonly>
                <input type="text" name="nama_role" id="nama_role" value="{{ $role->name }}" class="form-control @error('nama_role') is-invalid @enderror" placeholder="Nama Role (Peran)">
                @error('nama_role')
                    <span class="invalid-feedback register-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default btn-block">Update Peran</button>
            </div>
        </form>
    </div>
@endsection
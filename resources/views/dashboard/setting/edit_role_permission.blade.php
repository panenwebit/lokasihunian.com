@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Edit Role Permission(Peran)</h3>
                <p class="text-sm mb-0">
                    Atur hak akses dari setiap peran pada website lokasihunian.com . <br>
                </p>
            </div>
        </div>
        <form action="{{ url('dashboard/setting/role_permission') }}" method="post">
            @csrf
            @method('PATCH')
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-user"></i></span>
                </div>
                <input type="hidden" name="old_role" value="{{ $role->name }}" readonly>
                <input type="text" name="nama_role" id="nama_role" value="{{ $role->name }}" class="form-control @error('nama_role') is-invalid @enderror" placeholder="Nama Role (Peran)" readonly>
                @error('nama_role')
                    <span class="invalid-feedback register-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>         

            <h5 class="text-center">Permission (Hak Akses)</h5>
            <?php 
                $role_akses = array();
                foreach($role_permission as $akses){
                    array_push($role_akses, $akses->name);
                }
            ?>
            <div class="row my-3">
                @foreach($permissions as $permission)
                    <div class="col-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="permission[]" value="{{$permission->name}}" class="custom-control-input" id="{{$permission->name}}" <?php if(in_array($permission->name, $role_akses) ){ echo 'checked'; } ?>>
                            <label class="custom-control-label" for="{{$permission->name}}">{{$permission->name}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-default btn-block">Update Peran</button>
            </div>
        </form>
    </div>
@endsection
@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Edit Role (Peran) User</h3>
                <p class="text-sm mb-0">
                    Atur peran dan hak akses dari setiap pengguna website lokasihunian.com . <br>
                </p>
            </div>
        </div>
        <form action="{{ url('dashboard/setting/user_role') }}" method="post">
            @csrf
            @method('PATCH')
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-user"></i></span>
                </div>
                <input type="text" name="username" id="username" value="{{ $user->username }}" class="form-control" readonly>
            </div>

            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fas fa-cog"></i></span>
                </div>
                <select name="role" id="role" class="form-control" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default btn-block">Update Peran</button>
            </div>
        </form>
    </div>
@endsection
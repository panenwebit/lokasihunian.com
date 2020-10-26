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
        <form action="{{ url('dashboard/setting/user_role') }}" method="post" id="form-role-user">
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
                <button type="submit" class="btn btn-default btn-block" id="form-role-user-submit">Update Peran</button>
            </div>
        </form>
    </div>
@endsection

@section('page_js_plugins')
<script>
$(document).ready(function(){
    $('#form-role-user-submit').click(function(e){
        e.preventDefault();
        var pesan = "Apakah anda sudah yakin akan memperbarui peran dari user berikut?";
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
                    $('#form-role-user').submit();
                } else {
                    // alert('a');
                }
            }
        });
    }); 
});
</script>
@endsection
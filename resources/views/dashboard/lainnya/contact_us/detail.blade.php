@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="form-group">
        <label for="id">ID Form</label>
        <input type="text" class="form-control" value="{{ $public->id }}" readonly>
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" value="{{ $public->name }}" readonly>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" value="{{ $public->email }}" readonly>
    </div>
    <div class="form-group">
        <label for="informasi">Informasi</label>
        <textarea name="informasi" id="informasi" class="form-control" cols="30" rows="10" readonly>{{ $public->question }}</textarea>
    </div>
</div>
@endsection
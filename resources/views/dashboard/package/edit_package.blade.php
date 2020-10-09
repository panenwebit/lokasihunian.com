@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Edit Paket</h3>
                <p class="text-sm mb-0">
                    Ini adalah formulir untuk memperbarui paket Membership (keanggotaan) pada website lokasihunian.com . <br>
                </p>
            </div>
        </div>

        <form action="{{ url('dashboard/package/') }}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $package->id }}" readonly>
            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-box"></i></span>
                </div>
                <input type="text" name="nama_paket" id="nama_paket" class="form-control @error('nama_paket') is-invalid @enderror" placeholder="Nama Paket" value="{{ $package->name }}" required>
                @error('nama_paket')
                    <span class="invalid-feedback register-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group input-group-merge input-group-alternative mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-money-bill-alt"></i></span>
                </div>
                <input type="number" min="0" step="1" name="harga_paket" id="harga_paket" class="form-control @error('harga_paket') is-invalid @enderror" placeholder="Harga Paket" value="{{ $package->price }}" required>
                @error('harga_paket')
                    <span class="invalid-feedback register-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-home"></i></span>
                        </div>
                        <input type="number" min="0" step="1" name="limit_listing" id="limit_listing" class="form-control @error('limit_listing') is-invalid @enderror" placeholder="Limit Listing" value="{{ $package->limit_listing }}" required>
                        @error('limit_listing')
                            <span class="invalid-feedback register-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-building"></i></span>
                        </div>
                        <input type="number" min="0" step="1" name="limit_unggulan" id="limit_unggulan" class="form-control @error('limit_unggulan') is-invalid @enderror" placeholder="Limit Listing Unggulan" value="{{ $package->limit_unggulan }}" required>
                        @error('limit_unggulan')
                            <span class="invalid-feedback register-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa far fa-images"></i></span>
                        </div>
                        <input type="number" min="1" step="1" name="limit_photo" id="limit_photo" class="form-control @error('limit_photo') is-invalid @enderror" placeholder="Limit Foto Property / Posting" value="{{ $package->limit_photo_per_listing }}" required>
                        @error('limit_photo')
                            <span class="invalid-feedback register-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-default btn-block">Buat Paket</button>
            </div>
        </form>
    </div>
@endsection
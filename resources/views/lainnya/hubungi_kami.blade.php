@extends('layouts.app')

@section('content')
    <div class="container-fluid my-3">
    <br>
        <div class="container">
            <h2>Tentang Kami</h2>
            <p>{{ $site->about_us }}</p>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <h2 class="mt-3">Hubungi Kami</h2>
                    <p>Pertanyaan, kritik, dan saran mengenai lokasihunian.com dapat anda sampaikan menggunakan form berikut. Tim kami akan berusaha menghubungi anda dengan segera !</p>
                    <div class="container">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ url('public/hubungi_kami') }}" method="post">
                            @csrf
                            <div class="input-group input-group-merge input-group-alternative my-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa far fa-user"></i></span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nama anda" required>
                            </div>
                            <div class="input-group input-group-merge input-group-alternative my-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa far fa-envelope"></i></span>
                                </div>
                                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail anda" required>
                            </div>
                            <div class="input-group input-group-merge input-group-alternative my-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa far fa-question"></i></span>
                                </div>
                                <textarea name="question" id="question" class="form-control" cols="30" rows="5" placeholder="Pertanyaan, kritik, dan saran anda" required></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-default">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div style="overflow:hidden;resize:none;max-width:100%;width:600px;height:400px;">
                        <div id="display-googlemap" style="height:100%; width:100%;max-width:100%;">
                            <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Jalan%20Kalisari%20Dharma%20III%20%2F%2020%2C%20Kalisari%2C%20Surabaya%20City%2C%20East%20Java%2C%20Indonesia&key=AIzaSyDY7KXDCH8pYaoOycJTAkhER2f-QzCRgI8"></iframe>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
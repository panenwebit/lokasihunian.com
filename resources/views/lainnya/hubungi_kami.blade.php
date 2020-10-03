@extends('layouts.app')

@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h1 class="text-center mt-3">Hubungi Kami</h1>
                <p>Pertanyaan, kritik, dan saran mengenai lokasihunian.com dapat anda sampaikan menggunakan form berikut. Tim kami akan berusaha menghubungi anda secepatnya !</p>
                <div class="container">
                    <form action="" method="post">
                        <div class="input-group input-group-merge input-group-alternative my-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa far fa-user"></i></span>
                            </div>
                            <input type="text" name="nama" id="nama" placeholder="Nama anda" required>
                        </div>
                        <div class="input-group input-group-merge input-group-alternative my-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa far fa-envelope"></i></span>
                            </div>
                            <input type="email" name="email" id="email" placeholder="E-mail anda" required>
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
@endsection
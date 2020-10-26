@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Form FAQ</h3>
            <p class="text-sm mb-0">
                Ini adalah form yang digunakan untuk mencatat pertanyaan yang sering diajukan oleh pengguna website lokasihunian.com . <br>
            </p>
        </div>
    </div>

    <form action="{{ url('dashboard/faq') }}" method="post" id="form-faq">
        @csrf
        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-question"></i></span>
                </div>
                <input type="text" name="question" id="question" class="form-control form-control-alternative" placeholder="Pertanyaan" value="" required>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group input-group-merge input-group-alternative my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa far fa-info"></i></span>
                </div>
                <textarea name="answer" id="answer" class="form-control" cols="30" rows="5" placeholder="Jawaban" required></textarea>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-default btn-block" id="form-faq-submit">Simpan FAQ</button>
        </div>
    </form>
</div>
@endsection

@section('page_js_plugins')
<script>
$(document).ready(function(){
    $('#form-faq-submit').click(function(e){
        console.log('clik');
        e.preventDefault();
        var pesan = "Menambahkan FAQ?";
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
                    $('#form-faq').submit();
                } else {
                    // alert('a');
                }
            }
        });
    });
});
</script>
@endsection
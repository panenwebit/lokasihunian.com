@extends('layouts.app')

@section('content')
<br>
<div class="container mt-3 mb-5">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h1>Selamat Datang!</h1>
            <!-- <p>selamat bergabung di lokasihunian.com</p> -->
        </div>
        <div class="card-body">
            <p>Selamat bergabung di lokasihunian.com, tempat terbaik untuk menemukan hunian terbaik untuk anda.</p>
            <p>Untuk melanjutkan silahkan cek inbox pada email yang anda daftarkan, dan klik link tautan yang telah kami berikan!</p>
            <p>Jika anda tidak menemukan email yang kami maksud, anda dapat memeriksa kotak spam, atau 
                <a class="h4" href="{{ route('verification.send') }}" onclick="event.preventDefault(); document.getElementById('verification-send').submit();">
                    <span>KLIK DISINI</span>
                </a>
                untuk mengirim ulang email konfirmasi.
            </p>
            <form id="verification-send" action="{{ route('verification.send') }}" method="POST" class="d-none">
                @csrf
            </form>

            <p class="mb-0">Salam,</p>
            <p class="mt-0">LokasiHunian.com</p>
        </div>
    </div>
</div>
@endsection
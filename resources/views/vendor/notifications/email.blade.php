@component('mail::message')
    <h1>Selamat datang !</h1>
    <p>Silahkan klik tombol berikut untuk menyelesaikan proses pendaftaran anda!</p>
    <a href="{{ $actionUrl }}" target="_blank" class="btn btn-default">Konfirmasi Alamat E-Mail</a>
    
    Terimakasih,
    LokasiHunian.com

    {{-- Subcopy --}}
    @isset($actionText)
        @slot('subcopy')
            @lang(
                "Jika anda mengalami masalah dengan tombol \":actionText\" diatas, copy dan paste alamat link berikut\n".
                'ke web browser anda : ',
                [
                    'actionText' => $actionText,
                ]
            ) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
        @endslot
    @endisset
@endcomponent

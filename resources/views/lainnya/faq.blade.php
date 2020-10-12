@extends('layouts.app')

@section('content')
<br>
<div class="container mb-8">
    <h3 class="text-center">Frequently Asked Questions</h3>
    @foreach($faqs as $faq)
    <div class="accordion" id="accordion-{{ $loop->iteration }}">
        <div class="card m-3">
            <div class="card-header p-0" id="heading{{ $loop->iteration }}">
                <h2 class="mb-0 m-2" style="content:;">
                    <a href="#" class="btn-block text-left" style="" data-toggle="collapse" data-target="#collapse-{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapse-{{ $loop->iteration }}">
                        {{ $faq->question }}
                    </a>
                </h2>
            </div>

            <div id="collapse-{{ $loop->iteration }}" class="collapse" aria-labelledby="heading{{ $loop->iteration }}" data-parent="#accordion-{{ $loop->iteration }}">
                <div class="card-body">
                    {{ $faq->answer }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
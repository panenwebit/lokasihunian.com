@extends('layouts.app')

@section('content')
<br>
<div class="container" style="text-align:justify;">
<p class="text-right">Terakhir di update {{ date('d-m-Y H:i:s', strtotime($site->updated_at)) }}</p>
{!! $site->privacy_policy !!}
</div>
<br>
<br>
<br>
@endsection
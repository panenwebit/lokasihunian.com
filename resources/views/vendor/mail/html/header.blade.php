<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('assets/img/logo/logo.png') }}" alt="LokasiHunian.com" style="width:20rem;height:auto">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

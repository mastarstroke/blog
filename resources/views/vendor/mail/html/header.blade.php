@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Blog')
<h4 class="logo">Blog</h4>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

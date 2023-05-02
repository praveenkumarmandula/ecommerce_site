@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://cf.shopee.com.my/file/30c7dc3e01df6aa325d61c6c2c5fd944" height="200px" width="200px" class="logo" alt="shopee logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

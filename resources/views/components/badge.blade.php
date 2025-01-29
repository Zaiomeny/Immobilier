@props(['color'])
@php
    $color = match ($color) {
        'primary' => 'bg-primary',
        'secondary' => 'bg-secondary',
        'info' => 'bg-info',
        'warning' => 'bg-warning',
        'danger' => 'bg-danger',
        'success' => 'bg-success',
        'default'=> 'bg-default',
    }
@endphp
<label {{$attributes}} class="btn label {{ $color }}">{{ $slot }}</label>

@props(['post'])
@php
    $class = currentUser()?->hasliked($post) ? 'icofont icofont-heart-alt' : 'ti-heart';
@endphp
<button wire:click='toggleLike()' class="link bg-primary px-3 py-2 h6 rounded">
    {{ $post->likes->count() }} <i class="{{ $class }}"></i>
</button>
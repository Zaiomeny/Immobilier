@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'f-w-900 text-danger']) }}>{{ $message }}</p>
@enderror

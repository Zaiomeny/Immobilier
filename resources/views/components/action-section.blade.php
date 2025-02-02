<div {{ $attributes->merge(['class' => 'px-4 py-3 mt-4 card']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="sm:p-6">
            {{ $content }}
        </div>
    </div>
</div>

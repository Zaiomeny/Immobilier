@props(['submit'])

<div>
    <form wire:submit="{{ $submit }}" {{ $attributes->merge(['class' => 'md-float-material']) }}>
        <div class="text-center">
            {{-- {{ $logo }} --}}
        </div>

        <div class="auth-box">
            <x-section-title>
                <x-slot name="title">{{ $title }}</x-slot>
                <x-slot name="description">{{ $description }}</x-slot>
            </x-section-title>

            <div class="grid grid-cols-6 gap-6">
                {{ $form }}
            </div>
            @if (isset($actions))
                <div
                    class="flex items-center justify-end py-3 bg-gray-50 text-end">
                    {{ $actions }}
                </div>
            @endif
        </div>

    </form>
</div>

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="f-w-600 text-danger">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-danger">
            @foreach ($errors->all() as $error)
                <li><i class="icofont icofont-thumbs-down"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@props(['commentCount'])
<span {{ $attributes->merge(['class'=>"bg-info px-3 py-2 h6 rounded"]) }}>
    {{ $commentCount }} <i class="icofont icofont-comment"></i>
</span>
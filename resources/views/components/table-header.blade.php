<th wire:click="setOrderField('{{$name}}')" {{$attributes->merge(['class' => 'link'])}}>
    {{$slot}}
    @if($visible)
        @if($direction === 'ASC')
            <i class="ti-angle-up"></i>
        @else
            <i class="ti-angle-down"></i>
        @endif
    @endif
</th>

<div>
    <div class="page-header card">
        <livewire:search-box/>
    </div>
    <div class="page-body card">
        @if ($filterCategories || $search)
        <div class="filters mt-4">
            @if ($filterCategories)
            {{__('Catégorie : ')}}
            <x-badge color="success" :key="'filter-'.$filterCategories">{{$filterCategories}}</x-badge>
            @endif
            @if ($search)
            {{ __('Contenant : ') }}<span class="text-danger">{{$search}}</span>
            @endif
            <div><span x-on:click="$dispatch('resetFilters')" class="x-filter">X</span></div>
        </div>
        @endif
        <div class="card-block">
            @foreach ($this->posts as $post)
                <livewire:posts.post-item :$post :key='$post->id'/>
            @endforeach
        </div>
        <div class="card-footer">
            {{ $this->posts->links() }}
        </div>
    </div>
</div>


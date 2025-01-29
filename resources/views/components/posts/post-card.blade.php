@props(['post'])
<div {{ $attributes->merge(['class' => 'post-item']) }}>
    <img src="{{$post->getCover()}}" alt="" class="post-img">
    <div class="post-description">
        <div class="post-btns">
            <div>
                <x-comment.comment-badge class="mr-1" :commentCount="$post->comments->count()"/>
                <livewire:posts.like-post :$post :key="'like-' . $post->id" />
            </div>
            <span class="text-muted">{{ ucfirst(formatDate($post->created_at)) }}</span>
        </div>
        <div class="post-name">
            <div wire:navigate class="link"
                href="{{ route('post.show', ['post' => $post->id, 'slug' => $post->getSlug()]) }}">
                <h5>{{ $post->name }}</h5>
            </div>
            <div>
                <h5>{{ formatMoney($post->price) }} / {{ $post->surface }} m²</h5>
            </div>
        </div>
        <div class="post-badge">
            <p>
                @foreach ($post->categories as $category)
                <x-badge :color="$category->color" :key="$category->id">{{ $category->name
                    }}</x-badge>
                @endforeach
            </p>
        </div>
        <p wire:navigate class="link"
            href="{{ route('post.show', ['post' => $post->id, 'slug' => $post->getSlug()]) }}">
            {{$post->description}}
        </p>
        @empty($hideComments)
        <div x-data="{open:false}"> 
            <div x-on:click.outside="open = false">
                <div class="comment-setup">
                    <h4>Commentaires</h4>
                    <span class="text-center" x-on:click="open = !open">
                        <i class="bg-default rounded h6 px-3 py-1 link ti-angle-down" x-show="open"></i>
                        <i class="bg-default rounded h6 px-3 py-1 link ti-angle-up" x-show="open == false"></i>
                    </span>
                </div>
                <div x-show="open">
                    <livewire:comments.display-comments :comments='$post->comments' :key="Now().'-'.$post->id"/>
                </div>
                    <livewire:comments.form-comment :postId='$post->id'
                        :key="'form-comment-'.Now() . $post->id"/>
            </div>
        </div>
        @endempty
    </div>
</div>

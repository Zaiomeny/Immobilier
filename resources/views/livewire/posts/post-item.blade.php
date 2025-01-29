<div class="row mt-3">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div wire:navigate class="link h-100"
            href="{{ route('post.show', ['post' => $post->id, 'slug' => $post->getSlug()]) }}">
            <img src="{{ $post->getCover() }}" alt="{{ $post->name }}" class="img-fluid h-100 rounded">
        </div>
    </div>
    <div class="col-md-8 col-sm-6 col-xs-12 mt-1">
        <div class="row">
            <div class="col-sm-12">
                <div class="user">
                    <div class="post-item-user">
                        <img src="{{$post->user->profile_photo_url}}"
                            alt="{{$post->user->name}}">
                        <div class="user-details">
                            <span wire:navigate class="link" 
                                href="{{ route('user.profile', ['user' => $post->user->id]) }}">{{ $post->user->getName() }}</span>
                            <span class="text-muted">{{ ucfirst(formatDate($post->updated_at)) }}</span>
                        </div>
                    </div>
                    <div class="user-actions" x-data="{actions:false}">
                        <i class="ti-more" x-on:click.outside="actions = false" x-on:click="actions = !actions"></i>
                        <ul x-show="actions">
                            @can('update', $post)
                                <li>
                                    <a wire:navigate 
                                    href="{{ route('post.edit', ['post' => $post->id, 'slug' => $post->getSlug()]) }}"
                                    class="text-primary">Editer</a>
                                </li>
                            @endcan
                            <li>
                                <a wire:navigate 
                                href="{{ route('user.profile', ['user' => $post->user->id]) }}"
                                class="text-success">Profile</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="mt-2">
                    <h5>{{ $post->name }} | {{ formatMoney($post->price) }}</h5>
                    <p>{{ $post->getDescription() }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <hr>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div>
                    @foreach ($post->categories as $category)
                        <x-badge wire:navigate
                            href="{{ route('actualites', ['filterCategories' => $category->name]) }}"
                            :color="$category->color"
                            :key="$category->id">{{ $category->name }}</x-badge>
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right">
                <livewire:posts.like-post :post="$post" :key="'like-'.$post->id">
            </div>
        </div>
    </div>
    <hr class="w-100">
</div>


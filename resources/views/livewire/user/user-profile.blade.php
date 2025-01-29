<div>
    <div class="page-body">
        <div class="row">
            <div class="col-md-4 mt-2">
                <div class="p-4 card h-100">
                    <div class="user-img-profile-container">
                        <img src="{{ $user->profile_photo_url }}" class="user-img-profile" alt="" srcset="" />
                        <div class="user-name">
                            <h4>{{ $user->name }}</h4>
                            <span class="text-muted">{{ $user->email }}</span>
                        </div>
                    </div>
                    @if($isFollowButtonShouldBeVisible)
                    <div class="toggle-follow mt-3">
                        <livewire:user.toggle-following-user :$user :key="Now().$user->id"/>
                    </div>
                    @endif
                    <div class="about-user">
                        <livewire:user.user-followers :$user :key="'followers-'.Now().$user->id"/>
                        <livewire:user.subscribe-to :$user :key="'followers-'.Now().$user->id"/> 
                    </div>

                </div>
            </div>
            <div class="col-md-8 mt-2">
                <div class="card h-100 pb-0">
                    <div class="card-block pb-0">
                        @forelse($user->posts as $post)
                            <x-posts.post-card :$post />
                        @empty
                            <span class="text-muted">Cette personne n'a aucune publication !</span>
                        @endforelse
                    </div>
                    <div class="card-footer pt-0">
                        <button class="btn btn-secondary w-100">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

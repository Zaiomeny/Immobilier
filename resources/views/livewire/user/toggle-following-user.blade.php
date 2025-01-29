<button class="btn btn-sm w-100 btn-primary"
    wire:click='toggleFollowingState'>
    {{ currentUser()->subscribedTo($user)? 'Ne plus suivre' : 'Suivre'}}
</button>

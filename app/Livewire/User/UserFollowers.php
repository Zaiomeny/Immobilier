<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;

class UserFollowers extends Component
{
    public ?User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }
    #[Computed]
    public function followersCount()
    {
       return $this->user->followers->count();
    }
    
    #[On('FollowingStateChanged')]
    public function render()
    {
        return view('livewire.user.user-followers');
    }
}

<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class ToggleFollowingUser extends Component
{
    public ?User $user;
    public function toggleFollowingState()
    {
        if(auth()->guest()){
            return $this->redirect(route('login'),true);
        }
        /**@var User $user */
        $user = currentUser();
        if($user->subscribedTo($this->user))
        {
            $user->subscribeTo()->detach($this->user);
            $this->dispatch('FollowingStateChanged');
            return;
        }
        $user->subscribeTo()->attach($this->user);
        $this->dispatch('FollowingStateChanged');
    }    
    public function render()
    {
        return view('livewire.user.toggle-following-user');
    }
}

<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Computed;

class UserProfile extends Component
{
    public ?User $user;
    public function mount(User $user)
    {
        $this->user = $user;
    }
    #[Computed]
    public function posts()
    {
        return $this->user->posts()->with(['likes','comments']);
    }
    #[Computed]
    public function subscribeTo()
    {
        return $this->user->subscribeTo()->count();
    }
    public function render()
    {
        return view(
            'livewire.user.user-profile',
            [
                'isFollowButtonShouldBeVisible' => currentUser()->id !== $this->user->id,
            ]
        );
    }
}

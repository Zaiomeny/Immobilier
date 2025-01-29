<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SubscribeTo extends Component
{
    public ?User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }
    #[Computed]
    public function subscribeToCount(): int
    {
        return $this->user->subscribeTo->count();
    }
    public function render()
    {
        return view('livewire.user.subscribe-to');
    }
}

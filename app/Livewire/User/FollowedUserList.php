<?php

namespace App\Livewire\User;

use App\Service\Table_traits\Sortable;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;

class FollowedUserList extends Component
{
    use Sortable;
    #[Computed]
    public function users()
    {
        return currentUser()->subscribeTo()->with(['followers','posts'])->get();
    }
    #[On('FollowingStateChanged')]
    public function render()
    {
        return view('livewire.user.followed-user-list');
    }
}

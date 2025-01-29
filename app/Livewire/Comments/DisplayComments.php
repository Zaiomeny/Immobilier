<?php

namespace App\Livewire\Comments;

use Livewire\Attributes\On;
use Livewire\Component;

class DisplayComments extends Component
{
    public $comments;

    #[On('commentUpdated')]
    #[On('commentCreated')]
    #[On('commentDeleted')]
    public function render()
    {
        return view('livewire.comments.display-comments');
    }
}

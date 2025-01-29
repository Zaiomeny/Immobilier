<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use Livewire\Component;

class CommentItem extends Component
{

    public Comment $comment;
    public function delete(Comment $comment): void
    {
        $comment->delete();
        $this->dispatch('commentDeleted');
    }
    
    public function render()
    {
        return view('livewire.comments.comment-item');
    }
}

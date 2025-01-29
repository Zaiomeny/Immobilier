<?php

namespace App\Livewire\Comments;

use App\Livewire\Forms\CommentForm;
use App\Models\Comment;
use Livewire\Attributes\On;
use Livewire\Component;

class FormComment extends Component
{
    public CommentForm $commentForm;
    public int $postId;
    public function mount(int $postId):void{
        $this->commentForm->commentable_id = $postId;
        $this->commentForm->user_id = currentUser()->id;
        $this->commentForm->comment = new Comment();
    }
    #[On('defineId')]
    public function defineId(int $commentId):void
    {
        $comment = Comment::findOrFail($commentId);
        $this->commentForm->setComment($comment);
    }
    public function store(): void
    {
        $this->commentForm->store();
        $this->commentForm->reset('body');
        $this->dispatch('commentCreated');
    }
    public function save(): void
    {
        $this->commentForm->update();
        $this->dispatch('commentUpdated');
        $this->commentForm->reset();
    }
    public function render()
    {
        return view('livewire.comments.form-comment');
    }


}

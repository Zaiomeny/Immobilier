<?php

namespace App\Livewire\Forms;

use App\Models\Comment;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CommentForm extends Form
{
    public ?Comment $comment;

    #[Validate(rule: 'nullable|integer')]
    public $id;
    #[Validate('required|string')]
    public $body;
    #[Validate('required|integer')]
    public $user_id;
    #[Validate('required|integer')]
    public $commentable_id;

    public function setComment(Comment $comment): void
    {
        $this->comment = $comment;
        $this->id = $comment->id;
        $this->body = $comment->body;
        $this->user_id = $comment->user_id;
        $this->commentable_id = $comment->commentable_id;
    }
    public function store() : void
    {
        Comment::create($this->validate());
    }
    public function update(): void
    {
        $this->validate();
        $this->comment->update($this->all());
    }
    public function delete(): void
    {
        $this->comment->delete();
    }
}

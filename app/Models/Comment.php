<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable= [
        'body',
        'user_id',
        'commentable_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class,'commentable_id');
    }

    //Need this to be able to re-render a Livewire CommentItem component after updating its Comment contents
    public function getBodyLength():int
    {
        return strlen($this->body);
    }
}

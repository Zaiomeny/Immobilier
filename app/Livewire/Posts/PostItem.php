<?php

namespace App\Livewire\Posts;

use Livewire\Component;
Use App\Models\Post;
class PostItem extends Component
{
    public Post $post;
    public function render()
    {
        return view('livewire.posts.post-item');
    }
}

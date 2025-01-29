<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class LikePost extends Component
{
    public Post $post;

    public function toggleLike(){
        if(auth()->guest()){
            return $this->redirect(route('login'),true);
        }
        /**@var User $user */
        $user = currentUser();
        if($user->hasliked($this->post))
        {
            return $user->likes()->detach($this->post);
        }
        $user->likes()->attach($this->post);
    }
    public function render()
    {
        return view('livewire.posts.like-post');
    }
}

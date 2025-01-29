<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;

class Dashboard extends Component
{
    #[Computed()]
    public function posts(): Post | Builder |Collection
    {
        return Post::where('user_id',currentUser()->id)->get();
    }
    #[Computed]
    public function soldedPosts(): int
    {
        $AllSoldedPosts = [];
        
        foreach ($this->posts as $post) {
            if($post->sold == 1)
            {
                array_push($AllSoldedPosts, $post);
            }
        }
        return count($AllSoldedPosts);
    }
    #[Computed]
    public function priceAverage(): string
    {
        $sum = 0;
        $average =0;
        foreach($this->posts as $post)
        {
            $sum += $post->price;
        }
        $average = $sum/$this->posts->count();
        
        return formatMoney($average);
    }
    #[Computed]
    public function followers()
    {
        return currentUser()->followers->count();
    }
    #[Computed]
    public function subscribeTo()
    {
        return currentUser()->subscribeTo->count();
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}

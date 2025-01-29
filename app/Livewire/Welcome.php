<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
class Welcome extends Component
{
#[Computed()]    
public function postPopulars()
{
    return  Cache::remember('postPopulars',Carbon::now()->addDay(), function(){
        return Post::with(['likes','comments'])->withCount(['likes','comments'])->paginate(6);
    });
}
#[Computed()]
public function postLatests()
{
    return Cache::remember('postPopulars',Carbon::now()->addDay(), function(){
        return Post::latest()->with(['likes','comments'])->withCount(['likes','comments'])->paginate(6);
    });
}
    #[Layout('layouts.guest')] 
    public function render()
    {
        return view('livewire.welcome');
    }
}

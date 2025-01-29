<?php

namespace App\Livewire\Home;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Homepage extends Component
{
    use WithPagination;

    #[Url()]
    public $filterCategories;

    #[Url()]    
    public $search;


    /**Event dispatched form the livewire SearchBox component with AlpineJS */
    #[On('searchEvent')]
    public function search($search): void
    {
        if(!$search == '')
        {
            $this->search = $search;
        }
    }

    #[On('resetFilters')]
    public function resetFilter(): void
    {
        $this->reset(['search','filterCategories']);
        $this->resetPage();
    }
    public function updatedSearch(): void
    {
        $this->resetPage();
    }
    #[Computed()]
    public function posts()
    {
        return Post::where(column: 'name', operator: 'LIKE', value: "%{$this->search}%")
        ->when(
            value: Category::where(column: 'name', operator: 'LIKE', value: "%{$this->filterCategories}%")->first(),
            callback: function ( $query): void {
                $query->withCategories($this->filterCategories);
            }
        )
        ->with(['likes','categories','user'])
        ->orderBy(column: 'updated_at', direction: 'desc')
        ->paginate(perPage: 25);
    }
    public function render(): View
    {
        return view('livewire.home.homepage');
    }
}

<?php

namespace App\Livewire\Categories;

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use Livewire\Component;

class UpdateCategory extends Component
{
    public CategoryForm $categoryForm;

    public function mount(Category $category){
        $this->categoryForm->setCategory($category);
    }

    public function save()
    {
        $this->categoryForm->update();
        $this->categoryForm->reset();
        $this->dispatch('categoryUpdated');
    }
    public function render()
    {
        return view('livewire.categories.update-category');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;

class CategorySubcategory extends Component
{public $categories = [];
    public $selectedCategory;
    public $subcategories=[];
    public $sub_category_id; // Add this to allow binding and form submission


    public function mount(){
        $this->categories=Category::all();
    }
    public function updatedSelectedCategory($categoryid){
        $this->subcategories=SubCategory::where("category_id",$categoryid)->get();

    }
    public function render()
    {
        return view('livewire.category-subcategory');
    }
}

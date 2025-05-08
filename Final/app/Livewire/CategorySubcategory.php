<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;

class CategorySubcategory extends Component
{public $categories = [];
    public $selectedCategory;
    public $subcategories=[];


    public function mount(){
        $this->categories=Category::all();
    }
    public function updatedselectedcategory($categoryid){
        $this->subcategories=SubCategory::where("category_id",$categoryid)->get();

    }
    public function render()
    {
        return view('livewire.category-subcategory');
    }
}

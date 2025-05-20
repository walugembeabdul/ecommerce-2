<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Products;
use Livewire\Component;

class Homepagecomponent extends Component
{
    public $selectedcategory=null;
    public $categories=[];
    public function mount(){
        $this->categories=Category::all();
    }
    public function filterBycategory($categoryid){
$this->selectedcategory=$categoryid;
    }
    public function render()
    {$products=Products::with("images")->when($this->selectedcategory,function($query){
        $query->where("category_id",$this->selectedcategory);
    })->take(12)->get();
        return view('livewire.homepagecomponent',["products"=>$products]);
    }
}

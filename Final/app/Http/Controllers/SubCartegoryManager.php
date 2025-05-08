<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCartegoryManager extends Controller
{
    public function create_subcategory(){
        $categories=Category::all();
        return view("admin.sub_cartegory.create",compact("categories"));
    }
    public function manager_sub(){
        $subcategories=SubCategory::all();

        return view("admin.sub_cartegory.manager", compact("subcategories"));
    }
}

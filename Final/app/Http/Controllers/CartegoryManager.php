<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CartegoryManager extends Controller
{
    public function create_category(){
        return view("admin.category.create");
    }
    public function manager_category(){
        $categories=Category::all();
        return view("admin.category.manager",compact("categories"));
    }
}

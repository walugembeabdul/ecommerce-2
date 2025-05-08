<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductManager extends Controller
{
    public function manager_prodduct(){
        return view("admin.product.manager");
    }
    public function review_product(){
        return view("admin.product.manager");
    }
}

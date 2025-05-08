<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscountManager extends Controller
{
    public function create_discount(){
        return view("admin.discount.create");
    }
    public function manage_discount(){
        return view("admin.discount.manager");
    }
}

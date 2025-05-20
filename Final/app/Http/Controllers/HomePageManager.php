<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Homepagesetting;
use App\Models\Products;

class HomePageManager extends Controller
{
    public function home_index(){
        $date=Carbon::now()->format('d F');
        $homepage=Homepagesetting::with([
            "discounted_product.images",
            "product1.images",
            "product2.images",
        ]

        )->first();
        return view("home.index",compact("homepage","date"));
    }
    public function detils($id){
      $products=Products::with("images")->find($id);
        return view("homepage.details",compact("products"));
    }
}

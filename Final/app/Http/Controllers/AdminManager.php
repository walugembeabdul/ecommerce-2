<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Homepagesetting;

class AdminManager extends Controller
{
    public function index(){
        return view("dashboard.admin");
    }
    public function settings(){

        $products=Products::all();
        $homepage=Homepagesetting::first()??new Homepagesetting();
        return view("admin.setting.add",compact("products","homepage"));
    }
    public function update_settings(Request $request){
        $request->validate([
            "discounted_product_id"=>"required|exists:products,id",
            "discount_title"=>"required|string",
            "discount_percentage"=>"required|numeric",
            "product_1_id"=>"required",
            "product_2_id"=>"required",

        ]);
        $homepage=Homepagesetting::first()?? new Homepagesetting();
        $homepage->fill($request->all());
        $homepage->save();
        return redirect(route("settings"))->with("success","home page settings update successfully");

    }
    public function user(){
        return view("admin.user.manager");
    }
    public function add_user(){
        return view("admin.user.store");
    }
    public function cart_his(){
        return view("admin.cart.manager");
    }
    public function cart_manager(){
        return view("admin.cart.manager");
    }
    public function order_his(){
        return view("admin.order.history");
    }
}

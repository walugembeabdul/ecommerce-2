<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminManager extends Controller
{
    public function index(){
        return view("dashboard.admin");
    }
    public function settings(){
        return view("admin.setting.add");
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

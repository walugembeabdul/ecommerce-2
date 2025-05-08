<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerManager extends Controller
{
    public function index(){
        return view("dashboard.saler");
    }
    public function profile(){
    return view("customer.profile");
    }
    public function payment(){
        return view("customer.payment");
        }
        public function Order_history(){
            return view("customer.order");
            }
}

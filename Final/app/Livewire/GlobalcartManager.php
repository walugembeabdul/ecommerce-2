<?php

namespace App\Livewire;

use App\Models\Products;
use Livewire\Component;

class GlobalcartManager extends Component
{protected $listeners=["addcartFromAnywhere"=>"addToCart"];
     public function addToCart($productid,$quantity=1){
    $products=Products::findorfail($productid);
    $cart=session()->get("cart",[]);
    if(isset($cart[$productid])){
        $cart[$productid] += $quantity;
    }else{
        $cart[$productid]=[
            "name"=>$products->product_name,
            "price"=>$products->regular_price,
            "quantity"=>$quantity,
        ];

    }
    session()->put("cart",$cart);
        $this->dispatch("cartupdated");
        $this->dispatch("notify",title:"added to cart",type:"success");
}
    public function render()
    {
        return view('livewire.globalcart-manager');
    }
}

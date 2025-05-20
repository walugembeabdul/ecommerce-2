<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Products;
use App\Models\VendorStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductManager extends Controller
{
    public function manager_prodduct(){
        $vendor_id=Auth::id();
        $products=Products::where("vendor_id",$vendor_id)->simplepaginate(2);
        return view("vendor.product.manager",compact("products"));
    }
    public function create_products(){
        $user_id=Auth::id();
        $stores=VendorStore::where("user_id",$user_id)->get();
        return view("vendor.product.create",compact("stores"));
    }
    public function review_product(){
        return view("vendor.product.manager");
    }
    public function view_single_product ($id){
        $product=Products::find($id);
        return view("vendor.product.single",compact("product"));
    }
    public function store_products(Request $request){

        $request->validate([
            "product_name"=>"required|string|max:255",
            "description"=>"required|string",
            "sku"=>"required|string|unique:products,sku",
            "slug"=>"required|string|unique:products,slug",
            "category_id"=>"required",
            "sub_category_id"=>"required",
            "vendor_store_id"=>"nullable|exists:vendor_stores,id",
            "regular_price"=>"required|numeric|min:0",
            "discounted_price"=>"nullable|numeric|min:0",
            "taxe_rate"=>"required|numeric|min:0|max:100",
            "stock_quantity"=>"required|integer|min:0",
            "images"=>"nullable",


        ]);
        $user_id=Auth::id();
        $products=Products::create([
            "product_name"=>$request->product_name,
            "description"=>$request->description,
            "sku"=>$request->sku,
            "vendor_id"=>$user_id,
            "category_id"=>$request->category_id,
            "sub_category_id"=>$request->sub_category_id,
            "vendor_store_id"=>$request->vendor_store_id,
            "regular_price"=>$request->regular_price,
            "discounted_price"=>$request->discounted_price,
            "taxe_rate"=>$request->taxe_rate,
            "stock_quantity"=>$request->stock_quantity,
            "slug"=>$request->slug,
            "meta_title"=>$request->meta_title,
            "meta_description"=>$request->meta_description,
        ]);

        if($request->hasFile("images")){
        foreach($request->File("images") as $file){
            $path=$file->store("product_images","public");
            ProductImage::create([
                "product_id"=>$products->id,
                "image_path"=>$path,
                "is_primary"=>false,
            ]);
        }
        }
        return redirect(route("vendor_dashboard"))->with("success", "product added successfully");
    }
    public function edit_vendor_products($id){
        $vendor_id=Auth::id();
        $stores=VendorStore::where("id",$vendor_id)->get();
$products=Products::with("vendor")->findorfail($id);
return view("vendor.product.edit",compact("products","stores"));
    }
   public function update_vendor_pdt(Request $request, $id){

    $vendor_id = Auth::id();
    $product = Products::where('id', $id)
                       ->where('vendor_id', $vendor_id)
                       ->firstOrFail();

    $request->validate([
        "product_name" => "required|string|max:255",
        "description" => "required|string",
        "sku" => "required|string",
        "slug" => "required|string",
        "category_id" => "required|integer",
        "sub_category_id" => "required|integer",
        "vendor_store_id" => "required|exists:vendor_stores,id",
        "regular_price" => "required|numeric|min:0",
        "discounted_price" => "nullable|numeric|min:0",
        "taxe_rate" => "required|numeric|min:0|max:100",
        "stock_quantity" => "required|integer|min:0",
        "images" => "nullable|array",
        "images.*" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        "meta_title" => "nullable|string|max:255",
        "meta_description" => "nullable|string",
    ]);

    $product->update([
        "product_name" => $request->product_name,
        "description" => $request->description,
        "sku" => $request->sku,
        "vendor_id" => $vendor_id,
        "category_id" => $request->category_id,
        "sub_category_id" => $request->sub_category_id,
        "vendor_store_id" => $request->vendor_store_id,
        "regular_price" => $request->regular_price,
        "discounted_price" => $request->discounted_price,
        "taxe_rate" => $request->taxe_rate,
        "stock_quantity" => $request->stock_quantity,
        "slug" => $request->slug,
        "meta_title" => $request->meta_title,
        "meta_description" => $request->meta_description,
    ]);

    if ($request->hasFile("images")) {
        foreach ($request->file("images") as $file) {
            $path = $file->store("product_images", "public");
            ProductImage::create([
                "product_id" => $product->id,
                "image_path" => $path,
                "is_primary" => false,
            ]);
        }
    }

    return redirect()->route("vendor_dashboard")->with("success", "Product updated successfully");
}
}

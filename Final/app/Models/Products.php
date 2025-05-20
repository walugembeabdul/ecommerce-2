<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table="products";
    protected $guarded=[];
    public function category(){
        return  $this->belongsTo(Category::class,"category_id");
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class,"sub_category_id");
    }
    public function vendorstore(){
        return $this->belongsTo(VendorStore::class,"vendor_stores_id");
    }
    public function vendor(){
        return $this->belongsTo(user::class,"vendor_id");
    }
    public function images(){
        return $this->hasMany(ProductImage::class,"product_id");
    }

}

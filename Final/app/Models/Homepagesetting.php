<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homepagesetting extends Model
{protected $table="homepagesettings";
    protected $guarded=[];
    public function discounted_product(){
        return $this->belongsTo(Products::class,"discounted_product_id");
    }
    public function product1(){
        return $this->belongsTo(Products::class,"product_1_id");
    }
    public function product2(){
        return $this->belongsTo(Products::class,"product_2_id");
    }

}

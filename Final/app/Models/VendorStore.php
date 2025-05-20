<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorStore extends Model
{
    protected $table="vendor_stores";
   protected $guarded = [];
    public function user (){
        return $this->belongsTo(User::class,"user_id");
    }
}

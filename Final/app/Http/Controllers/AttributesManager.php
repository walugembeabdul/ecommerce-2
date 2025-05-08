<?php

namespace App\Http\Controllers;

use App\Models\DefaultAttributes;
use Illuminate\Http\Request;

class AttributesManager extends Controller
{
    public function create_attribute(){
        return view("admin.attributes.create");
    }
    public function manage_attribute(){
        $defaulatattributes=DefaultAttributes::all();
        return view("admin.attributes.manager" ,compact("defaulatattributes"));
    }

}

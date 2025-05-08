<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class MasterSubcategoryManager extends Controller
{
    public function store_Subcategory(Request $request){
        $formfields=$request->validate([
            "name"=>"required|unique:sub_categories,name,except,id|min:3",
            "category_id"=>"required|exists:categories,id",
        ]);
        SubCategory::create($formfields);
return redirect(route("manager_sub"));
    }
    public function single_sub($id){
        $subcategories=SubCategory::find(id:$id);
        return view("admin.sub_cartegory.single",compact("subcategories"));
    }
    public function edit_sub($id){
        $subcategories=SubCategory::findorfail($id);
        return view("admin.sub_cartegory.edit",compact("subcategories"));
    }

    public function update(Request $request,$id){
        $subcategories=SubCategory::findorfail($id);
        $formfields=$request->validate([
            "name"=>'required|min:3',
        ]);
        $subcategories->update($formfields);
        return redirect()->back();
    }
    public function delete_sub($id){
       SubCategory::findorfail($id)->delete();
        return redirect()->back();

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MastercategoryManager extends Controller
{
public function store_category(Request $request){
    $formfields=$request->validate([
        "name"=>'required|unique:categories,name,except,id|min:3',
    ]);
    Category::create($formfields);
    return redirect()->intended(route("admin_dashboard"))->with("success","category added");

}
//viewing single item
public function single(Category $categories){
//return $categories=Category::find("id",$id);
    return view("admin.category.one",compact("categories"));
}
public function edit(Category $categories){
    return view("admin.category.edit",compact("categories"));
}
///updating
public function update(Request $request,$id){
    $categories=Category::findorfail($id);
    $formfields=$request->validate([
        "name"=>'required|min:3',
    ]);
    $categories->update($formfields);
    return redirect()->back();
}
public function delete($id){
    Category::findorfail($id)->delete();
    return redirect()->back()->with("success","item deleted successfully");
}
}

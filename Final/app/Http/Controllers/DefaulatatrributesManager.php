<?php

namespace App\Http\Controllers;

use App\Models\DefaultAttributes;
use Illuminate\Http\Request;

class DefaulatatrributesManager extends Controller
{public function store(Request $request){
    $formfields=$request->validate([
        "name"=>"required|unique:default_attributes,name,except,id|min:2"
    ]);
    DefaultAttributes::create($formfields);
    return redirect(route("manage_attribute"));
}
public function single($id){
    $defaulatattributes=DefaultAttributes::find(id:$id);
    return view("admin.attributes.single",compact("defaulatattributes"));
}
public function edit_art($id){
    $defaulatattributes = DefaultAttributes::find($id);

    return view("admin.attributes.edit", compact("defaulatattributes"));
}

public function update(Request $request, $id)
{
     $defaulatattributes = DefaultAttributes::findOrFail(id:$id);

    $formfields = $request->validate([
        'name' => 'required|min:2|unique:default_attributes,name,',
    ]);

    $defaulatattributes->update($formfields);

    return redirect()->back()->with('success', 'Attribute updated successfully!');
}
public function delete_art($id){
DefaultAttributes::findorfail($id)->delete();
return redirect()->back()->with("success","item deleted successfully");
}

}

<?php

namespace App\Http\Controllers;

use App\Models\VendorStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class VendorManager extends Controller
{
    public function index(){
        return view("dashboard.vendor");
    }
    public function add_products(){
        return view("vendor.products");
    }
    public function show_products(){
        return view("vendor.show_products");
    }
    public function show_cart(){
        return view("vendor.cart");
    }
    public function view_form(){
        return view("vendor.stores.create_stores");
    }
    public function manage_store(){
        //all lists will be shown to whoever is a vendor
        //$stores=VendorStore::all();
        //specifing an individual list
         $user_id=Auth::user()->id;
        $stores=VendorStore::where("user_id",$user_id)->get();
        return view("vendor.stores.show_store", compact("stores"));
    }
    public function add_stores(Request $request){
        $request->validate([
            "name"=>"required|unique:vendor_stores,name,except,id",
            "description"=>"required",
            "slug"=>"required",

        ]);
        $user_id=Auth::user()->id;
        $stores=new VendorStore();
        $stores->name=$request->name;
        $stores->slug=$request->slug;
        $stores->description=$request->description;
        $stores->user_id=$user_id;
        if($stores->save()){
            return redirect(route("manage_stores"))->with("success","vendor item added successfully");
        }


    }
    public function edit_stores($id){
        $stores=VendorStore::find($id);
        return view("vendor.stores.edit",compact("stores"));
    }
//     public function update_stores(Request $request,$id){
//         $user_id=Auth::user()->id;
//         $stores=VendorStore::findorfail($id);
//        $formfields= $request->validate([
//                 "name"=>"required|unique:vendor_stores,name",
//                 "description"=>"required",
//                 "slug"=>"required",

//             ]);

//         //    $stores->name=$request->name;
//         //    $stores->slug=$request->slug;
//         //    $stores->description=$request->description;
//         //    $stores->user_id=$user_id;
//         //    if ($stores->save()){
//         //          return redirect()->back()->with("success","item updated successfully");
//         //         }return redirect(route("manage_stores"))->with("success","update failed");
//    $stores->update ($formfields)->where("user_id",$user_id);
//    return redirect()->back()->with("success","item updated successfully");
//     }
public function update_storage(Request $request, $id) {
    $user_id = Auth::user()->id;
    $stores = VendorStore::findOrFail($id);

   // Ensure the store belongs to the authenticated user
    if ($stores->user_id !== $user_id) {
        return redirect()->back()->with("error", "Unauthorized action.");
    }

     $request->validate([
        "name" => "required|unique:vendor_stores,name",
        "description" => "required",
        "slug" => "required",
    ]);

    $stores->update([
        "name"=>$request->name,
        "slug"=>$request->slug,
        "description"=>$request->description,
        "user_id"=>$user_id,

    ]);

    return redirect()->back()->with("success", "Item updated successfully");
}
// public function update_storage(Request $request, $id)
// {
//     $user = Auth::user();
//     $store = VendorStore::findOrFail($id);

//     // Authorization check
//     if ($store->user_id !== $user->id) {
//         return redirect()->back()->with("error", "Unauthorized action.");
//     }

//     // Validate input with proper unique rule for update
//     $validated = $request->validate([
//         'name' => 'required',
//         'description' => 'required|string',
//         'slug' => 'required|string',
//     ]);

//     try {
//         $store->update([
//             'name' => $validated['name'],
//             'slug' => $validated['slug'],
//             'description' => $validated['description'],
//             'user_id' => $user->id,
//         ]);

//         return redirect()->back()->with("success", "Store updated successfully.");
//     } catch (\Exception $e) {

//         return $e->getMessage();
//     }
// }

// public function update_storage(Request $request, $id)
// {
//     $userId = Auth::id();

//     // Check if the store exists and belongs to the user
//     $store = DB::table('vendor_stores')->where('id', $id)->first();

//     if (!$store) {
//         return redirect()->back()->with('error', 'Store not found.');
//     }

//     if ((int) $store->user_id !== (int) $userId) {
//         abort(403, 'Unauthorized action.');
//     }

//     // Validate input
//     $validated = $request->validate([
//         'name' => [
//             'required',
//             'string',
//             Rule::unique('vendor_stores', 'name')->ignore($id),
//         ],
//         'description' => 'required|string|min:10',
//         'slug' => [
//             'required',
//             'string',
//             Rule::unique('vendor_stores', 'slug')->ignore($id),
//         ],
//     ]);

//     try {
//         DB::table('vendor_stores')
//             ->where('id', $id)
//             ->update([
//                 'name' => $validated['name'],
//                 'slug' => $validated['slug'],
//                 'description' => $validated['description'],
//                 'updated_at' => now(),
//             ]);

//         return redirect()->back()->with('success', 'Store updated successfully.');

//     } catch (\Throwable $e) {
//         Log::error('Store update failed', [
//             'store_id' => $id,
//             'user_id' => $userId,
//             'error' => $e->getMessage(),
//         ]);

//         return redirect()->back()->with('error', 'Failed to update the store. Please try again.');
//     }
// }

}

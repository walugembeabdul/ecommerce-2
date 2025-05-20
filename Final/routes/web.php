<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminManager;
use App\Http\Controllers\VendorManager;
use App\Http\Controllers\ProductManager;
use App\Http\Controllers\CustomerManager;
use App\Http\Controllers\DiscountManager;
use App\Http\Controllers\CartegoryManager;
use App\Http\Controllers\AttributesManager;
use App\Http\Controllers\DefaulatatrributesManager;
use App\Http\Controllers\HomePageManager;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCartegoryManager;
use App\Http\Controllers\MastercategoryManager;
use App\Http\Controllers\MasterSubcategoryManager;
use App\Livewire\Home\Welcome;
use App\Models\DefaultAttributes;
//homepagecontroller
 Route::controller(HomePageManager::class)->group(function () {
Route::get('/',"home_index")->name("myhome");
Route::get('/product_details/{id}',"detils")->name("detail");

        });
// Route::get('/',Welcome::class)->name("homepage");
//customer routes
Route::middleware(['auth', 'verified', 'rolemiddleware:customer'])->group(function () {
    Route::prefix('customer')->group(function () {
        Route::controller(CustomerManager::class)->group(function () {
Route::get('/saler/dashboard',"index")->name("dashboard");
Route::get('/profile',"profile")->name("profile");
Route::get('/Payment',"Payment")->name("payment_status");
Route::get('/Payment_add',"Payment_add")->name("customer_payments");
Route::get('/order',"order_history")->name("Order_history");

        });
});
});
//admin routes
Route::middleware(['auth', 'verified', 'rolemiddleware:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
    Route::controller(AdminManager::class)->group(function () {
        Route::get("/dashboard","index")->name("admin_dashboard");
        Route::get("/settings","settings")->name("settings");
        Route::put("/update_admin_settings","update_settings")->name("up_settings");
        Route::get("/user","user")->name("user_manager");
        Route::get("/add_user","add_user")->name("add_user");
        Route::get("/cart_his","cart_his")->name("cart_his");
        Route::get("/cart_manager","cart_manager")->name("cart_manager");
        Route::get("/order","order_his")->name("order_his");
        });
        //master category controller
        Route::controller(MastercategoryManager::class)->group(function () {
            Route::post("/store_category","store_category")->name("store_category");
    Route::get("/single/{categories}","single")->name("single_items");
    Route::get("/edit/{categories}","edit")->name("edit_items");
    Route::put("/update/{categories}","update")->name("update_items");
    Route::delete("/delete/{categories}","delete")->name("delete_items");
        });

        Route::controller(CartegoryManager::class)->group(function () {
            Route::get("/create_category","create_category")->name("create_category");
    Route::get("/manager_category","manager_category")->name("manager_category");
        });


//mastersubcategorycontroller
Route::controller(MasterSubcategoryManager::class)->group(function () {
    Route::post("/store_Subcategory","store_Subcategory")->name("store_Subcategory");
 Route::get("/singlesub/{id}","single_sub")->name("single_sub");
Route::get("/edit-sub/{id}","edit_sub")->name("edit_sub");
 Route::put("/update-sub/{id}","update")->name("update_sub");
Route::delete("/delete_sub/{id}","delete_sub")->name("delete_sub");
});

        //subcategory
        Route::controller(SubCartegoryManager::class)->group(function () {
            Route::get("/create_subcategory","create_subcategory")->name("create_subcategory");
    Route::get("/manager_sub","manager_sub")->name("manager_sub");
        });

        //atrributes
        Route::controller(AttributesManager::class)->group(function () {
            Route::get("/reate_attribute","create_attribute")->name("create_attribute");
    Route::get("/manage_attribute","manage_attribute")->name("manage_attribute");
        });
        //discounts
        Route::controller(DiscountManager::class)->group(function () {
            Route::get("/reate_discount","create_discount")->name("create_discount");
    Route::get("/manage_discount","manage_discount")->name("manage_discount");
        });
        //default atributes
        Route::controller(DefaulatatrributesManager::class)->group(function () {
     Route::post("/store","store")->name("store_attributes");
     Route::get("/single_art/{id}","single")->name("single_attributes");
     Route::get("/edit-a/{id}","edit_art")->name("edit_attributes");
     Route::put("/update-a/{id}","update")->name("update_attributes");
    Route::delete("/delete-art/{id}","delete_art")->name("delete_arts");
         });
    });

});
//vendor rotes
Route::middleware(['auth', 'verified', 'rolemiddleware:vendor'])->group(function () {
    Route::prefix('vendor')->group(function () {
        Route::controller(VendorManager::class)->group(function () {
            Route::get('/vendor/dashboard',"index")->name("vendor_dashboard");
            Route::get('/cart/dashboard',"show_cart")->name("show_cart");
            // Route::get('/products',"show_products")->name("show_products");
            // Route::get('/add_products',"add_products")->name("add_products");
           // Route::get('/plus',"plus_store")->name("create_stores");
            Route::get('/manage_store',"manage_store")->name("manage_stores");
            Route::get('/view',"view_form")->name("view_store_form");
            Route::post('/add_store/dashboard',"add_stores")->name("add_stores");
            Route::get('/edit_store/{id}/dashboard',"edit_stores")->name("edit_stores");
            Route::put('/update_store/{id}/dashboard',"update_storage")->name("update_storage");
        });
                //products
                Route::controller(ProductManager::class)->group(function () {
                    Route::get("/manager_prodduct","manager_prodduct")->name("manager_prodduct");
                    Route::get("/create_prodduct","create_products")->name("create_prodduct");
                    Route::post("/prodduct_store","store_products")->name("vendor_store_prodduct");
            Route::get("/review_product","review_product")->name("review_product");
            Route::get("/view_single/{id}","view_single_product")->name("view_single_product");
            Route::get("/edit_vendor_products/{id}","edit_vendor_products")->name("edit_vendor_product");
            Route::delete("/delete_vendor_pdt/{id}","delete_vendor_pdts")->name("delete_vendor_pdts");
            Route::put("/update_vendor_pdt/{id}","update_vendor_pdt")->name("update_vendor_pdts");
                });
    });
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

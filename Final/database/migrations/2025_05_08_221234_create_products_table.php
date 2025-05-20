<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("product_name");
            $table->longText('description');
            $table->string('sku')->unique();
            $table->foreignId("vendor_id")->constrained("users")->onDelete("cascade");
            $table->foreignId("category_id")->constrained("categories")->onDelete("cascade");
            $table->foreignId("sub_category_id")->constrained("sub_categories")->onDelete("cascade");
            $table->foreignId("vendor_store_id")->constrained("vendor_stores")->onDelete("cascade");
            $table ->decimal("regular_price",8,3);
            $table ->decimal("discounted_price",8,3)->nullable();
            $table ->decimal("taxe_rate",5,3)->default(0.00);
            $table ->integer("stock_quantity")->default(0.);
            $table ->enum('stock_status',['in_stock',"stock_out"])->default("in_stock");
            $table->string("slug")->unique();
            $table->boolean("status")->default(0);
            $table->string("meta_title")->nullable();
            $table->text("meta_description")->nullable();
            $table->enum("visibility",["draft","published"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

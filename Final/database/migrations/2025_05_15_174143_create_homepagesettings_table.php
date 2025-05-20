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
        Schema::create('homepagesettings', function (Blueprint $table) {
            $table->id();
            $table->string("discount_title");
            $table->float("discount_percentage");
            $table->foreignId("discounted_product_id")->constrained("products")->onDelete("cascade");
            $table->foreignId("product_1_id")->constrained("products")->onDelete("cascade");
            $table->foreignId("product_2_id")->constrained("products")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepagesettings');
    }
};

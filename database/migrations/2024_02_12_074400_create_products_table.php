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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('model')->nullable();
            $table->decimal('buying_price',10,2);
            $table->decimal('selling_price',10,2);
            $table->decimal('special_price',10,2)->nullable();
            $table->date('special_start')->nullable();
            $table->date('special_end')->nullable();
            $table->integer('quantity');
            $table->string('video_url')->nullable();
            $table->tinyInteger('warranty')->default(0);
            $table->string('warranty_duration')->nullable();
            $table->longText('warranty_conditions')->nullable();
            $table->string('thumbnail');
            $table->string('gallery')->nullable();
            $table->string('description');
            $table->longText('long_description')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('category_id')->on('categories')->references('id')->cascadeOnDelete();
            $table->foreign('subcategory_id')->on('subcategories')->references('id')->cascadeOnDelete();
            $table->foreign('brand_id')->on('brands')->references('id')->cascadeOnDelete();
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

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
            $table->string('name_product', 30);
            $table->string('color', 100);
            $table->string('form', 20);
            $table->string('product_description', 45);
            $table->float('price');
            $table->string('url_principal_picture', 45);
            $table->integer('quantity');
            $table->integer('quantity_alert');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('image_id');
            $table->unsignedBigInteger('ofert_id');
            $table->foreign('ofert_id')->references('id')->on('oferts');

            $table->engine = 'InnoDB';
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

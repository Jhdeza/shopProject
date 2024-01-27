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
            $table->string('name', 30);
            $table->string('color', 100)->nullable();
            $table->string('form', 20)->nullable();
            $table->string('description', 45);
            $table->float('price');
            $table->integer('quantity');
            $table->integer('quantity_alert');
            $table->boolean('act_carusel')->nullable();
            $table->boolean('is_new')->nullable();
            $table->integer('views');


            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
           
            $table->unsignedBigInteger('ofert_id')->nullable();
            $table->foreign('ofert_id')->references('id')->on('oferts');

            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('categories');

            $table->integer('stock')->default(0);

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

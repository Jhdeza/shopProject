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
        Schema::create('oferts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('percet');
            $table->timestamp('date_ini');
            $table->timestamp('date_end');
            $table->boolean('active');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oferts');
    }
};

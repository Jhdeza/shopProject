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
        Schema::create('contacts_information', function (Blueprint $table) {
            $table->id();
            $table->string('name_contact',45);
            $table->string('phone_contacts',45);
            $table->string('email',45);
            $table->string('address_contacts',45);
            $table->string('logo')->nullable();
            $table->string('description');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts_information');
    }
};

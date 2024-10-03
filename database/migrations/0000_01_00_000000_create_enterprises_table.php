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
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('name');
            $table->string('ent_type');
            $table->string('nit')->unique();
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->integer('tax_ammount');
            $table->string('tax_name');
            $table->string('currency');
            $table->string('address');
            $table->string('post_code');
            $table->text('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enterprises');
    }
};

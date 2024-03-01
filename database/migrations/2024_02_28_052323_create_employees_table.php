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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->casecadeOnDelete();
            $table->foreignId('state_id')->constrained()->casecadeOnDelete();
            $table->foreignId('city_id')->constrained()->casecadeOnDelete();
            $table->foreignId('department_id')->constrained()->casecadeOnDelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->string('phone');
            $table->string('email');
            $table->date('joining_date');
            $table->string('sex');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

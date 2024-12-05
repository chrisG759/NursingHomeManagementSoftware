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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('family_code');
            $table->string('family_id');
            $table->string('name');
            $table->string('doctor_name');
            $table->string('appointment_time');
            $table->string('caregiver_name');
            $table->string('morning_medicine');
            $table->string('afternoon_medicine');
            $table->string('night_medicine');
            $table->string('breakfast');
            $table->string('lunch');
            $table->string('dinner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};

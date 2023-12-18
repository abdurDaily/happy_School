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
        Schema::create('facultystaffs', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->string('employee_designation');
            $table->string('employee_phone');
            $table->string('employee_email');
            $table->string('employee_image');
            $table->string('employee_join_date');
            $table->longText('employee_about');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facultystaffs');
    }
};

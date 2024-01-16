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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('std_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('contact_no');
            $table->string('alter_contact_no')->nullable();
            $table->string('email');
            $table->string('present_address');
            $table->date('birth_date');
            $table->string('division');
            $table->string('district');
            $table->string('Upazila');
            $table->string('village');
            $table->integer('admission_class');
            $table->integer('admission_class_group');
            $table->string('std_img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};

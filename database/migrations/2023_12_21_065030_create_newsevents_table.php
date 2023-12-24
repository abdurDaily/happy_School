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
        Schema::create('newsevents', function (Blueprint $table) {
            $table->id();
            $table->string('event_title');
            $table->longText('event_detail');
            $table->string('event_video')->nullable();
            $table->string('event_img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsevents');
    }
};

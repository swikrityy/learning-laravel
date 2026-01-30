<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daily_visits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('qualification')->nullable();
            $table->string('country')->nullable();
            $table->string('course')->nullable();
            $table->date('visit_date')->nullable();
            $table->time('visit_time')->nullable();
            $table->string('purpose')->nullable();
            $table->string('purpose_other')->nullable();
            $table->string('status')->nullable();
            $table->string('heard_about_us')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_visits');
    }
};

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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->default(1)->nullable();
            $table->boolean('status')->default(0);
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();

            $table->string('facebook')->nullable()->default('/');
            $table->string('twitter')->nullable()->default('/');
            $table->string('instagram')->nullable()->default('/');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};

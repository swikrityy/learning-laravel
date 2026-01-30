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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->default(1)->nullable();
            $table->boolean('status')->default(0);
            $table->string('title')->nullable();
            $table->mediumText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('country_id')->default(0);

            $table->string('slug')->nullable();
            $table->string('seo_title')->nullable();
            $table->longText('seo_schema')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};

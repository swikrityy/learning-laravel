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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->mediumText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('banner_image')->nullable();

            $table->integer('order')->default(1)->nullable();
            $table->boolean('status')->default(0);
            $table->longText('slug')->nullable();

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
        Schema::dropIfExists('pages');
    }
};

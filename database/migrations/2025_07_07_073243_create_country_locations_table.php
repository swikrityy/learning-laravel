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
        Schema::create('country_locations', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable()->comment('Status of the country location');
            $table->integer('order')->nullable()->comment('Order of the country locations for display');
            $table->string('name')->comment('Name of the country location');
            $table->string('countryname')->comment('Name of the country this location belongs to');
            $table->string('location')->comment('Location of the country location');
            $table->text('shortdescription')->nullable()->comment('Short description of the country location');
            $table->text('description')->nullable()->comment('Description of the country location');
            $table->string('image1')->nullable()->comment('Image associated with the country location');
            $table->string('image2')->nullable()->comment('Image associated with the country location');
            $table->string('link')->nullable()->comment('Link to more information about the country location');
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
        Schema::dropIfExists('country_locations');
    }
};

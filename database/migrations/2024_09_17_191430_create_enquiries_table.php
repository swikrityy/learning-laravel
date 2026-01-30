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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();

            // Basic Info
            $table->string('full_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('note')->nullable();
            $table->string('consultant')->nullable();
            $table->string('priority')->nullable();

            // Academic Qualification
            $table->string('qualification')->nullable();
            $table->string('see_school_name')->nullable();
            $table->string('see_gpa')->nullable();
            $table->string('see_passed_year')->nullable();
            $table->string('plus_two_college_name')->nullable();
            $table->string('plus_two_gpa')->nullable();
            $table->string('plus_two_passed_year')->nullable();
            $table->string('bachelor_college_name')->nullable();
            $table->string('bachelor_gpa')->nullable();
            $table->string('bachelor_passed_year')->nullable();
            $table->string('master_college_name')->nullable();
            $table->string('master_gpa')->nullable();
            $table->string('master_passed_year')->nullable();

            // Additional Info
            $table->string('marital_status')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('phone2')->nullable();

            // Guardian Info
            $table->string('parents_name')->nullable();
            $table->string('g_address')->nullable();
            $table->string('g_mobile')->nullable();
            $table->string('g_email')->nullable();

            // Other Details
            $table->string('preferred_country')->nullable();
            $table->string('language_test')->nullable();
            $table->string('test_type')->nullable()->nullable();
            $table->string('test_score')->nullable()->nullable();
            $table->string('preferred_education')->nullable();
            $table->string('preferred_institution_name')->nullable();
            $table->json('source')->nullable();
            $table->text('message')->nullable();

            $table->text('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};

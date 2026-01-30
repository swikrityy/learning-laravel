<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('enquiries', function (Blueprint $table) {
            $table->string('purpose_of_visit')->nullable()->after('id');
        });
    }

    public function down()
    {
        Schema::table('enquiries', function (Blueprint $table) {
            $table->dropColumn('purpose_of_visit');
        });
    }
};

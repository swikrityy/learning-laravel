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
        Schema::table('albums', function (Blueprint $table) {
            if (!Schema::hasColumn('albums', 'slug')) {
                $table->string('slug')->unique()->nullable()->after('name');
            }
        });

        // Backfill slugs for existing albums
        $albums = \DB::table('albums')->whereNull('slug')->orWhere('slug', '')->get();

        foreach ($albums as $album) {
            $slug = Str::slug($album->name);

            // ensure unique slug
            $originalSlug = $slug;
            $counter = 1;
            while (\DB::table('albums')->where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }

            \DB::table('albums')
                ->where('id', $album->id)
                ->update(['slug' => $slug]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('albums', function (Blueprint $table) {
            if (Schema::hasColumn('albums', 'slug')) {
                $table->dropColumn('slug');
            }
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {

            $table->longText('extra_content')->nullable()->after('description');

            $table->string('tags')->nullable()->after('extra_content');

        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {

            $table->dropColumn(['extra_content', 'tags']);

        });
    }
};

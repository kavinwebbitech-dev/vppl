<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('testimonials', function (Blueprint $table) {
        $table->longText('video_iframe')->nullable()->after('id');
    });
}

public function down()
{
    Schema::table('testimonials', function (Blueprint $table) {
        $table->dropColumn('video_iframe');
    });
}
};

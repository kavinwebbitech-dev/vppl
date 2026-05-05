<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();

            $table->string('position');
            $table->text('description')->nullable();
            $table->string('industry')->nullable();
            $table->string('experience')->nullable();
            $table->string('salary')->nullable();
            $table->string('location')->nullable();
            $table->string('welding_types')->nullable();
            $table->string('working_time')->nullable();

            $table->text('benefits')->nullable();
            $table->text('skills')->nullable();
            $table->text('roles_responsibilities')->nullable();
            $table->text('education')->nullable();

            $table->boolean('status')->default(1); // 1 = Active, 0 = Inactive

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('careers');
    }
};

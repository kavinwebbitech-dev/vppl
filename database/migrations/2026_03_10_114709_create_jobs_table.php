<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('jobs');

        Schema::create('jobs', function (Blueprint $table) {

            $table->id();

            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('subject');

            $table->string('resume')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
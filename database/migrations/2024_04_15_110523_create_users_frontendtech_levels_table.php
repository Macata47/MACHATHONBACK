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
        Schema::create('users_frontendtech_levels', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('frontendtechnology_id');
            $table->unsignedBigInteger('level_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('frontendtechnology_id')->references('id')->on('frontendtechnologies');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_frontendtech_levels');
    }
};

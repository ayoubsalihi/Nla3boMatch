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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string("type_match");
            $table->string("level_match");
            $table->string("result");
            $table->unsignedBigInteger("competition_id");
            $table->unsignedBigInteger("team1_id");
            $table->unsignedInteger("team2_id");
            $table->unsignedBigInteger("terrain_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};

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
        Schema::create('knockouts', function (Blueprint $table) {
            $table->id();
            $table->string("round");
            $table->unsignedBigInteger("team1_id");
            $table->unsignedBigInteger("team2_id");
            $table->unsignedBigInteger("winner_id")->nullable();
            $table->unsignedBigInteger("partido_id");
            $table->unsignedBigInteger("competition_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knockouts');
    }
};

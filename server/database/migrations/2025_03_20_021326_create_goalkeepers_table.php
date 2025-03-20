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
        Schema::create('goalkeepers', function (Blueprint $table) {
            $table->id();
            $table->integer("diving");
            $table->integer("reflex");
            $table->integer("kicking");
            $table->integer("handling");
            $table->integer("positionning");
            $table->integer("speed");
            $table->unsignedBigInteger("player_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goalkeepers');
    }
};

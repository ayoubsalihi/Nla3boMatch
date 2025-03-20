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
        Schema::create('inside_players', function (Blueprint $table) {
            $table->id();
            $table->integer("pace");
            $table->integer("dribbling");
            $table->integer("shooting");
            $table->integer("defending");
            $table->integer("passing");
            $table->integer("physical");
            $table->unsignedBigInteger("player_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inside_players');
    }
};

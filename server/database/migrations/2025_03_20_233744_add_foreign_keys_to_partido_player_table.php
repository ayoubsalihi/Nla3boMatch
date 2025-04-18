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
        Schema::table('partido_player', function (Blueprint $table) {
            $table->foreign("partido_id")->references("id")->on("partidos")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("player_id")->references("id")->on("players")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partido_player', function (Blueprint $table) {
            $table->dropForeign("partido_id");
            $table->dropForeign("player_id");
        });
    }
};

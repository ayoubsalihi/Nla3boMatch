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
        Schema::table('partidos', function (Blueprint $table) {
            $table->foreign("team1_id")->references("id")->on("teams")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("competition_id")->references("id")->on("competitions")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("terrain_id")->references("id")->on("terrains")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partidos', function (Blueprint $table) {
            $table->dropForeign("team1_id");
            $table->dropForeign("terrain_id");
            $table->dropForeign("competition_id");
        });
    }
};

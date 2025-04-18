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
        Schema::table('knockouts', function (Blueprint $table) {
            $table->foreign("competition_id")->references("id")->on("competitions")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("team1_id")->references("id")->on("teams")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("team2_id")->references("id")->on("teams")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("winner_id")->references("id")->on("teams")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("partido_id")->references("id")->on("partidos")->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('knockouts', function (Blueprint $table) {
            $table->dropForeign("competition_id");
            $table->dropForeign("team1_id");
            $table->dropForeign("team2_id");
            $table->dropForeign("winner_id");
            $table->dropForeign("partido_id");
        });
    }
};

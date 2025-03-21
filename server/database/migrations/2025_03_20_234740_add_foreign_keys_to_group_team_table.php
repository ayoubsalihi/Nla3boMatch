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
        Schema::table('group_team', function (Blueprint $table) {
            $table->foreign("group_id")->references("id")->on("groups")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("team_id")->references("id")->on("teams")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('group_team', function (Blueprint $table) {
            $table->dropForeign("group_id");
            $table->dropForeign("team_id");
        });
    }
};

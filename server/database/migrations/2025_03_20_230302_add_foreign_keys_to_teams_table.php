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
        Schema::table('teams', function (Blueprint $table) {
            $table->foreign("competition_id")->references("id")->on("competitions")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("terrain_id")->after("competition_id");
            $table->foreign("terrain_id")->references("id")->on("terrains")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropForeign("competitions_id");
            $table->dropForeign("terrain_id");
        });
    }
};

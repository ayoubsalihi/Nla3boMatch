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
        Schema::table('goalkeepers', function (Blueprint $table) {
            $table->foreign("player_id")->references("id")->on("players")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('goalkeepers', function (Blueprint $table) {
            $table->dropForeign("player_id");
        });
    }
};

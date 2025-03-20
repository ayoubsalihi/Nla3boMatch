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
        Schema::table('users', function (Blueprint $table) {
            //$table->foreign('cad_club_id',)->references('id')->on('cad_clubs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("player_id")->references("id")->on("players")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("admin_id")->references("id")->on("admins")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign("player_id");
            $table->dropForeign("admin_id");
        });
    }
};

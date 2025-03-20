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
        Schema::create('group_team', function (Blueprint $table) {
            $table->id();
            $table->integer("points");
            $table->integer("GF");            
            $table->integer("GA");            
            $table->integer("GD");
            $table->unsignedBigInteger("team_id");
            $table->unsignedBigInteger("group_id");            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_team');
    }
};

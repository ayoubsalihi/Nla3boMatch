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
            $table->enum("round", ["amical","group", "1/8", "1/4", "1/2", "final"])->after("result");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partidos', function (Blueprint $table) {
            //
        });
    }
};

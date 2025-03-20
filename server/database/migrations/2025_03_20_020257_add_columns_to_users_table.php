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
            $table->string("nom");
            $table->string("prenom");
            $table->string("cin")->nullable();
            $table->enum("type_utilisateur",["player","admin"]);
            $table->string("telephone");
            $table->string("ville_residence");
            $table->string("quartier");
            $table->unsignedBigInteger("player_id");
            $table->unsignedBigInteger("admin_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};

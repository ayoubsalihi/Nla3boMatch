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
        Schema::table('messages', function (Blueprint $table) {
            $table->foreign("chat_id")->references("id")->on("chats")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("sender_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("team_chat_id")->references("id")->on("team_chats")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign("chat_id");
            $table->dropForeign("sender_id");
            $table->dropForeign("team_chat_id");
        });
    }
};

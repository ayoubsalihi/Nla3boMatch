<?php

use App\Models\Teams\TeamChat;
use App\Models\Users\Message;

test("Team Chat has one team",function(){
    $teamChat = TeamChat::factory()->create();
    expect($teamChat->team->id)->toBe($teamChat->team_id);
    
});

test("Team Chat has many messages",function(){
    $teamChat = TeamChat::factory()->create();
    $message = Message::factory()->create([
        "team_chat_id" => $teamChat->id,
    ]);
    expect($teamChat->id)->toBe($message->team_chat_id);
});

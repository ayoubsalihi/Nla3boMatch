<?php

use App\Models\Teams\TeamChat;
use App\Models\Users\Message;
use App\Models\Users\User;

test("Message has one chat",function(){
    $message = Message::factory()->create();
    expect($message->chat->id)->toBe($message->chat_id);
});

test("Message has one sender",function(){
    $message = Message::factory()->create();
    expect($message->sender->id)->toBe($message->sender_id);
});

test("Message has many team chat",function(){
    $teamChat = TeamChat::factory()->create();
    $message = Message::factory()->create(
        [
            "team_chat_id" => $teamChat->id,
        ]
    );
    expect($message->teamchat->id)->toBe($message->team_chat_id);    
});
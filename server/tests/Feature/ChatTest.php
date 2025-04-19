<?php

use App\Models\Users\Chat;
use App\Models\Users\Message;
use App\Models\Users\User;

test("Chat has one user1 as sender",function(){
    $chat = Chat::factory()->create();
    $user = User::factory()->create();
    expect($chat->user1->id)->toBe($chat->user1_id);
});

test("Chat has one user 2 as reciever",function(){
    $chat = Chat::factory()->create();
    $user = User::factory()->create();
    expect($chat->user2->id)->toBe($chat->user2_id);
});

test("Chat has many mesages",function(){
    $chat = Chat::factory()->create();
    $messages = Message::factory()->count(3)->create([
        'chat_id' => $chat->id,
    ]);
    expect($messages->count())->toBe(3);
});
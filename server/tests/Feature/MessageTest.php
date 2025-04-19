<?php

use App\Models\Users\Message;

test("Message has one chat",function(){
    $message = Message::factory()->create();
    expect($message->chat->id)->toBe($message->chat_id);
});

test("Message has one sender",function(){
    $message = Message::factory()->create();
    expect($message->sender->id)->toBe($message->sender_id);
});

test("Message has one reciever",function(){
    $message = Message::factory()->create();
    expect($message->reciever->id)->toBe($message->reciever_id);
});
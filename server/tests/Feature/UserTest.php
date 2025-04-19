<?php

use App\Models\Users\Admin;
use App\Models\Users\Chat;
use App\Models\Users\Player;
use App\Models\Users\User;

/**
 * The test is for User model
 * the test will take 
 */

test("User has one admin",function(){
    $user = User::factory()->create();
    $admin = Admin::factory()->create(['user_id'=>$user->id]);
    $this->assertInstanceOf(Admin::class,$user->admin);
    expect($user->admin->id)->toBe($admin->id);
});

test("User has one player",function(){
    $user = User::factory()->create();
    $player = Player::factory()->create(['user_id'=>$user->id]);
    $this->assertInstanceOf(Player::class,$user->player);
    expect($user->player->id)->toBe($player->id);
});

test("User has many chats",function(){
    $user = User::factory()->create();
    $chats = Chat::factory()->count(3)->create([
        'user1_id' => $user->id,
        'user2_id' => User::factory()->create()->id,
    ]);
    $this->assertInstanceOf(Chat::class, $chats->first());
    expect($user->chats->count())->toBe(3);
});
<?php

use App\Models\Users\Admin;
use App\Models\Users\Chat;
use App\Models\Users\Player;
use App\Models\Users\User;

/**
 * The test is for User model
 * the test will take charge of 3 methods
 * 1. User has one admin - admin()
 * 2. User has one player - player()
 * 3. User has many chats - chats()
 * 4. To get the owner - getOwner()
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

test("Get the owner of user",function(){
    $user = User::factory()->create();
    $admin = Admin::factory()->create(['user_id'=>$user->id]);
    expect($user->getOwner()->id)->toBe($admin->id);

    $user = User::factory()->create();
    $player = Player::factory()->create([
        "user_id" => $user->id,
    ]);
});
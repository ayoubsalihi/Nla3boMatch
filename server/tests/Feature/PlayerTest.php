<?php

use App\Models\Competitions\Competition;
use App\Models\Teams\Team;
use App\Models\Users\Goalkeeper;
use App\Models\Users\InsidePlayer;
use App\Models\Users\Player;
use App\Models\Users\User;

/**
 * The test will take charge of Player model
 * and of the following methods
 * 1. Player is a user - user()
 * 2. Player can be goalkeeper - goalkeeper()
 * 3. Player can be inside player - insideplayer()
 */

test("Player is a user",function(){
    $user = User::factory()->create();
    $player = Player::factory()->create(['user_id'=>$user->id]);
    expect($player->user->id)->toBe($user->id);
});

test("Player can be goalkeeper",function(){
    $player = Player::factory()->create();
    $goalkeeper = Goalkeeper::factory()->create(['player_id'=>$player->id]);
    expect($player->goalkeeper->id)->toBe($goalkeeper->id);
});

test("Player can be Inside player",function(){
    $player = Player::factory()->create();
    $insidePlayer = InsidePlayer::factory()->create(['player_id'=>$player->id]);
    expect($player->insideplayer->id)->toBe($insidePlayer->id);
});

test("Player can join one team",function(){
    $team = Team::factory()->create();
    $player = Player::factory()->create(
        [
            'team_id' => $team->id,
        ]
    );
    expect($player->team->id)->toBe($team->id);
});

test("Player can join many competitions",function(){
    $player = Player::factory()->create();
    $team = Team::factory()->create();
    $player->team()->associate($team);
    $player->save();
    $competitions = Competition::factory()->count(3)->create();
    foreach ($competitions as $competition) {
        $competition->teams("competition_team")->attach($team->id);
    }
    expect($player->competitions()->count())->toBe(3);
});
<?php

use App\Models\Competitions\Competition;
use App\Models\Competitions\Group;
use App\Models\Competitions\Partido;
use App\Models\Teams\Team;
use App\Models\Teams\TeamChat;
use App\Models\Terrains\Terrain;
use App\Models\Users\Player;

/**
 * this test will take charge of Team model
 */

test("a team can participate in many competitions",function(){
    $team = Team::factory()->create();
    $competition = Competition::factory()->create();
    $team->competitions()->attach($competition->id);
    expect($team->competitions->contains($competition))->toBeTrue();
});

test("a Team can have many players",function(){
    $team = Team::factory()->create();
    $players = Player::factory()->count(3)->create(
        [
            "team_id" => $team->id,
        ]
    );

    expect($team->players()->count())->toBe(3);

});

test("a team can have one terrain",function(){
    $terrain = Terrain::factory()->create();
    $team = Team::factory()->create(
        [
            "terrain_id" => $terrain->id,
        ]
    );

    expect($team->terrain->id)->toBe($team->terrain_id);
});

test("a team can have many reservations with morphMany",function(){
    $team = Team::factory()->create();
    $terrain = Terrain::factory()->create();
    $reservation = $team->reservations()->create(
        [
            "terrain_id" => $terrain->id,
            "start_time" => now(),
            "end_time" => now()->addHours(2),
        ]
    );

    expect($team->reservations->contains($reservation))->toBeTrue();
});

test("a team can have one TeamChat",function(){
    $team = Team::factory()->create();
    $teamchat = TeamChat::factory()->create(
        [
            "team_id" => $team->id,
        
        ]
    );
    expect($team->id)->toBe($teamchat->team_id);
});

test("a team can participates in many matches",function(){
    $team = Team::factory()->create();
    $match = Partido::factory()->create();
    $team->matches()->attach($match->id);
    expect($team->matches->contains($match))->toBeTrue();
});

test("a team can be in many groups",function(){
    $team = Team::factory()->create();
    $group = Group::factory()->create();
    $team->groups()->attach($group->id, [
        "points" => 6,
        "GF" => 10,
        "GA" => 5,
        "GD" => 5,
    ]);
    expect($team->groups->contains($group))->toBeTrue();
});
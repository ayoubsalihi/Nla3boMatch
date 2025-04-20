<?php

use App\Models\Competitions\Competition;
use App\Models\Competitions\Group;
use App\Models\Teams\Team;

test("a group is a part of one competition", function(){
    $competition = Competition::factory()->create();
    $group = Group::factory()->create([
        "competition_id" => $competition->id,
    ]);

    expect($group->competition->id)->toBe($group->competition_id);
});

test("a group take charge of many teams",function(){
    $team = Team::factory()->create();
    $group = Group::factory()->create();

    $group->teams("group_team")->attach($team->id,[
        "points" => 6,
        "GF" => 10,
        "GA" => 5,
        "GD" => 5,
    ]);
    expect($group->teams("group_team")->count())->toBe(1);
});

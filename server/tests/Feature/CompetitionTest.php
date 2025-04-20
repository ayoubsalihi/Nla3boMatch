<?php

use App\Models\Competitions\Competition;
use App\Models\Competitions\Group;
use App\Models\Competitions\Partido;
use App\Models\Posts\Post;

test("a competition have many posts",function(){
    $competition = Competition::factory()->create();
    $post = Post::factory()->create([
        "competition_id" => $competition->id,
    ]);

    expect($competition->id)->toBe($competition->posts[0]->competition_id);
});

test("a competition has many matches",function(){
    $competition = Competition::factory()->create();
    $partidos = Partido::factory()->create([
        "competition_id" => $competition->id,
    ]);

    expect($competition->id)->toBe($competition->matches[0]->competition_id);
});

test("a competition has many groups",function(){
    $competition = Competition::factory()->create();
    $group = Group::factory()->create([
        "competition_id" => $competition->id,
    ]);

    expect($competition->id)->toBe($competition->groups[0]->competition_id);
    
});
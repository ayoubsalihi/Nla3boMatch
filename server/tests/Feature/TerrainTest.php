<?php

use App\Models\Competitions\Partido;
use App\Models\Teams\Team;
use App\Models\Terrains\Academy;
use App\Models\Terrains\Reservation;
use App\Models\Terrains\Terrain;

test("Terrain has many teams",function(){
    $terrain = Terrain::factory()->create();
    $teams = Team::factory()->count(3)->create(
        [
            "terrain_id" => $terrain->id,
        ]
    );
    expect($terrain->teams()->count())->toBe(3); 
});

test("Terrain has many reservations",function(){
    $terrain = Terrain::factory()->create();
    $reservations = Reservation::factory()->count(3)->create(
        [
            "terrain_id" => $terrain->id,
        ]
    );
    expect($terrain->reservations()->count())->toBe(3); 
});

test("a terrain could have many matches",function(){
    $terrain = Terrain::factory()->create();
    $matches = Partido::factory()->count(3)->create(
        [
            "terrain_id" => $terrain->id,
        ]
    );
    expect($terrain->matches()->count())->toBe(3);
});

test("a terrain could have many academies",function(){
    $terrain = Terrain::factory()->create();
    $academies = Academy::factory()->count(3)->create(
        [
            "terrain_id" => $terrain->id,
        ]
    );
    expect($terrain->academies()->count())->toBe(3);
});
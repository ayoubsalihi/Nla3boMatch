<?php

use App\Models\Teams\Team;
use App\Models\Terrains\Academy;
use App\Models\Terrains\Reservation;
use App\Models\Terrains\Terrain;

test("Team and academy has morphTo relationship with Reservation",function(){
    $team = Team::factory()->create();
    $reservation = Reservation::factory()->create(
        [
            "reservable_id" => $team->id,
            "reservable_type" => Team::class,
        ]
    );
    expect($reservation->reservable->id)->toBe($reservation->reservable_id);

    $academy = Academy::factory()->create();
    $reservation = Reservation::factory()->create(
        [
            "reservable_id" => $academy->id,
            "reservable_type" => Academy::class,
        ]
    );
    expect($reservation->reservable->id)->toBe($reservation->reservable_id);
});

test("Reservation has one terrain",function(){
    $terrain = Terrain::factory()->create();
    $reservation = Reservation::factory()->create(
        [
            "terrain_id" => $terrain->id,
        ]
    );
    expect($reservation->terrain->id)->toBe($reservation->terrain_id);
});

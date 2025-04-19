<?php

use App\Models\Terrains\Academy;
use App\Models\Terrains\Reservation;

test("Academy has MorphMany with Reservation",function(){
    $academy = Academy::factory()->create();
    $reservation = Reservation::factory()->create(
        [
            "reservable_id" => $academy->id,
            "reservable_type" => Academy::class,
        ]
    );
    expect($academy->reservations[0]->id)->toBe($reservation->id);
});

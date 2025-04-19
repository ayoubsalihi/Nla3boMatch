<?php

use App\Models\Users\InsidePlayer;
use App\Models\Users\Player;

test("an Inside player is a player",function(){
    $player = Player::factory()->create();
    $insidePlayer = InsidePlayer::factory()->create(
        [
            "player_id" => $player->id,
        ]
    );
    expect($insidePlayer->player->id)->toBe($insidePlayer->player_id);
});

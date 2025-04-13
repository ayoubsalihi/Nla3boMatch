<?php

namespace App\Traits;

use App\Models\Users\Player;

trait PlayersManagement
{
    /**
     * Thiss trait to manage the player method on Goalkeeper and Player models
     */

     public function player(){
        return $this->hasOne(Player::class);
    }
}

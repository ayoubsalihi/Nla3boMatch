<?php

namespace App\Models\Users;

use App\Models\Users\Player;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goalkeeper extends Model
{
    /** @use HasFactory<\Database\Factories\GoalkeeperFactory> */
    use HasFactory;
    protected $guarded = [];

    // each goalkeeper is a player
    public function player(){
        return $this->hasOne(Player::class);
    }
}

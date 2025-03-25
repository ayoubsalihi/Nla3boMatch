<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsidePlayer extends Model
{
    /** @use HasFactory<\Database\Factories\InsidePlayerFactory> */
    use HasFactory;

    protected $guarded = [];
    
    // each D/M/F is a player
    public function player(){
        return $this->hasOne(Player::class);
    }
}

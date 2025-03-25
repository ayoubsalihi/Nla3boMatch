<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /** @use HasFactory<\Database\Factories\PlayerFactory> */
    use HasFactory;
    protected $guarded = [];
    // every player is a user
    public function user(){
        return $this->hasOne(User::class);
    }
    // each player is joining only one team
    public function team(){
        return $this->hasOne(Team::class);
    }
}

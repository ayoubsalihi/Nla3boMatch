<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /** @use HasFactory<\Database\Factories\TeamFactory> */
    use HasFactory;
    protected $guarded = [];
    // each team could participate in one or many competitions
    public function competitions(){
        return $this->belongsToMany(Competition::class,"competition_team");
    }
    // each team contains many players
    public function players(){
        return $this->belongsToMany(Player::class,"player_team");
    }
    /**
     * Get the terrain reserved by team
     */
    public function terrain(){
        return $this->belongsTo(Terrain::class);
    }
    /**
     * Each team could make one or many reservations
     */
    public function reservation(){
        return $this->belongsToMany(Reservation::class);
    }
    /**
     * Each team has a spesific team chat
     */
    public function team_chat(){
        return $this->hasOne(TeamChat::class);
    }
}

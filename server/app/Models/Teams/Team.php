<?php

namespace App\Models\Teams;

use App\Models\Competitions\Competition;
use App\Models\Competitions\Group;
use App\Models\Competitions\Partido;
use App\Models\Terrains\Reservation;
use App\Models\Terrains\Terrain;
use App\Models\Users\Player;
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
        return $this->hasMany(Player::class);
    }
    /**
     * Get the terrain reserved by team
     */
    public function terrain(){
        return $this->belongsTo(Terrain::class);
    }
    /**
     * Each team could make one or many reservations
     * @see Reservation
     * @see Terrain
     */
    public function reservations(){
        return $this->morphMany(Reservation::class, 'reservable');
    }
    /**
     * Each team has a spesific team chat
     */
    public function team_chat(){
        return $this->hasOne(TeamChat::class);
    }

    public function matches(){
        return $this->belongsToMany(Partido::class);
    }

    public function groups(){
        return $this->belongsToMany(Group::class);
    }

    
}

<?php

namespace App\Models\Users;

use App\Models\Goalkeeper;
use App\Models\InsidePlayer;
use App\Models\Team;
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
    /**
     * A player could be a goalkeeper
     */
    public function goalkeeper(){
        return $this->belongsTo(Goalkeeper::class);
    }
    /**
     * A player can be a D/M/F
     */
    public function insideplayer(){
        return $this->belongsTo(InsidePlayer::class);
    }
}

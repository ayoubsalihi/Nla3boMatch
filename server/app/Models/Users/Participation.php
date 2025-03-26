<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    /** @use HasFactory<\Database\Factories\ParticipationFactory> */
    use HasFactory;
    /**
     * this model is for the player_match table
     * @abstract model
     */
    protected $guarded = [];
    protected $table = "match_player";
}

<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartidoPlayer extends Model
{
    /** @use HasFactory<\Database\Factories\ParticipationFactory> */
    use HasFactory;
    /**
     * this model is for the player_match table
     * @abstract model
     */
    protected $guarded = [];
    protected $table = "partido_player";
}

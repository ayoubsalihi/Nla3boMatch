<?php

namespace App\Models\Competitions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartidoTeam extends Model
{
    /** @use HasFactory<\Database\Factories\CompeteFactory> */
    /**
     * @abstract this model is for match_team table
     */
    use HasFactory;

    protected $guarded = [];
    protected $table = "partido_team";
}

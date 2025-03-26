<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionTeam extends Model
{
    /** @use HasFactory<\Database\Factories\CompetitionTeamFactory> */
    use HasFactory;
    /**
     * @abstract this model is for the competition_team table
     */

     protected $guarded = [];
     protected $table = "competition_team";
}

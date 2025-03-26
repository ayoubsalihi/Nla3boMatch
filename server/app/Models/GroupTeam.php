<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupTeam extends Model
{
    /** @use HasFactory<\Database\Factories\GroupTeamFactory> */
    /**
     * @abstract this model is for group_team table
     */
    use HasFactory;
    protected $guarded = [];
    protected $table = "group_team";
}

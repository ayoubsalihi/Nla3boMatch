<?php

namespace App\Models\Teams;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamChat extends Model
{
    /** @use HasFactory<\Database\Factories\TeamChatFactory> */
    use HasFactory;
    protected $guarded =[];
    // each team chat belongs to a specific team
    public function team(){
        return $this->hasOne(Team::class);
    }
}

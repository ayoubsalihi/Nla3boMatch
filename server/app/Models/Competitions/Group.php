<?php

namespace App\Models\Competitions;

use App\Models\Teams\Team;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /** @use HasFactory<\Database\Factories\GroupFactory> */
    use HasFactory;

    protected $guarded = [];
    // each griup is related to one competition
    public function competition(){
        return $this->hasOne(Competition::class);
    }

    // each group contain many teams
    public function teams(){
        return $this->hasMany(Team::class,"group_team");
    }
}

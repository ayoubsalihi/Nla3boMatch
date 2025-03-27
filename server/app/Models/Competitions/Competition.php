<?php

namespace App\Models\Competitions;

use App\Models\Posts\Post;
use App\Models\Teams\Team;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    /** @use HasFactory<\Database\Factories\CompetitionFactory> */
    use HasFactory;
    protected $guarded = [];
    // a competition contains many teams
    public function teams(){
        return $this->hasMany(Team::class,"competition_team");
    }
    // a competition could have many posts
    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    // a competition take charge of many matches
    public function matches(){
        return $this->hasMany(Partido::class);
    }   

    // each competition has many knockouts stages
    public function knockouts(){
        return $this->hasMany(Knockout::class);
    }
}

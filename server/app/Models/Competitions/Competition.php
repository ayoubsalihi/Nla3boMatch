<?php

namespace App\Models\Competitions;

use App\Models\Posts\Post;
use App\Traits\TeamsManagement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    /** @use HasFactory<\Database\Factories\CompetitionFactory> */
    use HasFactory , TeamsManagement;
    protected $guarded = [];
    // a competition could have many posts
    public function posts(){
        return $this->hasMany(Post::class);
    }

    // a competition take charge of many matches
    public function matches(){
        return $this->hasMany(Partido::class);
    } 

    public function groups(){
        return $this->hasMany(Group::class);
    }
}

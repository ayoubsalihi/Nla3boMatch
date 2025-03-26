<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    /** @use HasFactory<\Database\Factories\PartidoFactory> */
    use HasFactory;
    /**
     * @abstract name - this model is for matches table because the Match name is taken by PHP
     */

     protected $guarded = [];
     protected $table = "matches";
    /**
     * Every match take charge of teams
    */
    public function teams(){
        return $this->hasMany(Team::class);
    }
    /**
     * Each match has team 1
     */
    public function team1(){
        return $this->hasOne(Team::class,"team1_id");
    }
    /**
     * Each match has team 2
     */
    public function team2(){
        return $this->hasOne(Team::class,"team2_id");
    }
    /**
     * Each match has a terrain to be played in
     */
    public function terrain(){
        return $this->hasOne(Terrain::class);
    }
    /**
     * A match could be part of a competition
     */
    public function competition(){
        return $this->belongsTo(Competition::class);
    }
    /**
     * A match is played by many players
     */
    public function players(){
        return $this->belongsToMany(Player::class,"match_player");
    }
    /**
     * a match can have some posts
     */
    public function posts(){
        return $this->hasMany(Post::class);
    }
    /**
     * A match can be a knockout match
     */
    public function knockout(){
        return $this->belongsTo(Knockout::class);
    }
}

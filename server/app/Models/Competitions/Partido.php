<?php

namespace App\Models\Competitions;

use App\Models\Posts\Post;
use App\Models\Teams\Team;
use App\Models\Terrains\Terrain;
use App\Models\Users\Player;
use App\Traits\TeamsManagement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    /** @use HasFactory<\Database\Factories\PartidoFactory> */
    use HasFactory , TeamsManagement;
    /**
     * @abstract name - this model is for matches table because the Match name is taken by PHP
     */

     protected $guarded = [];
     
    /**
     * Each match has team 1
     */
    public function team1(){
        return $this->belongsTo(Team::class,"team1_id");
    }
    /**
     * Each match has team 2
     */
    public function team2(){
        return $this->belongsTo(Team::class,"team2_id");
    }
    /**
     * Each match has a terrain to be played in
     */
    public function terrain(){
        return $this->belongsTo(Terrain::class);
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
     * We want to make some optimized query builder methods
     * to manage competitions that having knockouts and groups
     * @param $query
     */
    // this method is used to get the matches that are in the knockout stage
    public function scopeKnockouts($query){
        return $query->where('round', '!=', 'group_stage');
    }

    // this method is used to get the matches that are in the group stage
    public function scopeGroupMatches($query){
        return $query->where('round' , 'group_stage');
    }

    /**
     * this method is used to get the Knockout matches
     */
    public static function getKnockoutMatches($query, $competitionId){
        return $query->where('round', '!=', 'group_stage')
            ->where('competition_id', $competitionId)
            ->get();
    }

    /**
     * this method is used to get the matches by rounds
     */
    public static function getMatchesByStage($query, $competitionId, $round){   
        return $query
            ->where('competition_id', $competitionId)
            ->where('round', $round)
            ->get();
    }
}

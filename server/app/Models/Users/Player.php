<?php

namespace App\Models\Users;

use App\Models\Competitions\Competition;
use App\Models\Users\Goalkeeper;
use App\Models\Users\InsidePlayer;
use App\Models\Teams\Team;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\IsUser;
use App\Traits\TeamsManagement;

class Player extends Model
{
    /** @use HasFactory<\Database\Factories\PlayerFactory> */
    use HasFactory , IsUser , TeamsManagement;
    protected $guarded = [];
    /**
     * A player could be a goalkeeper
     */
    public function goalkeeper(){
        return $this->belongsTo(Goalkeeper::class);
    }
    /**
     * A player can be a D/M/F
     */
    public function insideplayer(){
        return $this->belongsTo(InsidePlayer::class);
    }

    public function competitions()
{
    return Competition::query()
        ->select('competitions.*')
        ->join('competition_team', 'competitions.id', '=', 'competition_team.competition_id')
        ->join('teams', 'competition_team.team_id', '=', 'teams.id')
        ->where('teams.id', optional($this->team)->id);
}

}

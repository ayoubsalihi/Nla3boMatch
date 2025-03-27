<?php

namespace App\Models\Competitions;

use App\Models\Teams\Team;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knockout extends Model
{
    /** @use HasFactory<\Database\Factories\KnockoutFactory> */
    use HasFactory;
    protected $guarded = [];

    public function teams(){
        return $this->hasMany(Team::class);
    }
    /**
     * Get the first team associated with the knockout.
     */
    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    /**
     * Get the second team associated with the knockout.
     */
    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }

    /**
     * Get the winner team associated with the knockout.
     */
    public function winner()
    {
        return $this->belongsTo(Team::class, 'winner_id');
    }

    /**
     * Get the match associated with the knockout.
     */
    public function match()
    {
        return $this->belongsTo(Partido::class);
    }

    /**
     * Get the competition associated with the knockout.
     */
    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    /** @use HasFactory<\Database\Factories\TerrainFactory> */
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the teams associated with terrain
     */
    public function teams(){
        return $this->hasMany(Team::class);
    }
    /**
     * Get the reservation associated with terrain
     */
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    /**
     * Get the matches played on this  terrain
     */
    public function matches(){
        return $this->hasMany(Partido::class);
    }
    /**
     * A terrain can be taken by many academies
     */
    public function academies(){
        return $this->hasMany(Academy::class);
    }
}

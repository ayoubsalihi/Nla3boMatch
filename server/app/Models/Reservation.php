<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /** @use HasFactory<\Database\Factories\ReservationFactory> */
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the team associated with the reservation
     */
    public function team(){
        return $this->hasOne(Team::class);
    }
    /**
     * Each reservation should be associated with a terrain
     */
    public function terrain(){
        return $this->hasOne(Terrain::class);
    }
    
}

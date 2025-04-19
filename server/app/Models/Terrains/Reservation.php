<?php

namespace App\Models\Terrains;

use App\Models\Teams\Team;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /** @use HasFactory<\Database\Factories\ReservationFactory> */
    use HasFactory;
    protected $guarded = [];

    /**
     * The morph relationshi^is used here because we have the same relationship with Team and Reservation models
     */
    public function reservable()
    {
        return $this->morphTo();
    }
    /**
     * Each reservation should be associated with a terrain
     */
    public function terrain(){
        return $this->belongsTo(Terrain::class);
    }
    
}

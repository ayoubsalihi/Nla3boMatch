<?php

namespace App\Models\Terrains;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    /** @use HasFactory<\Database\Factories\AcademyFactory> */
    use HasFactory;
    protected $guarded = [];

    /**
     * The morph relationship because the Terrain model has one relationship with Relationship and Team.
     */
    public function reservations(){
        return $this->morphMany(Reservation::class, 'reservable');
    }
}
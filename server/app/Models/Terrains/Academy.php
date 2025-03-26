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
     * Each academy has the right to reserve only one terrain
     */
    public function terrain(){
        return $this->hasOne(Terrain::class);
    }
}
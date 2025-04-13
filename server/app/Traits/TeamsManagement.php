<?php

namespace App\Traits;

use App\Models\Teams\Team;

trait TeamsManagement
{
    /**
     * In our database structure we have a teams table 
     * which is having many to many relationship with 3 models
     * 1. Player
     * 2. Group
     * 3. Partido
     */

     public function teams(){
        return $this->hasMany(Team::class);
    }
}

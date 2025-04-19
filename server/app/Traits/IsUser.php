<?php

namespace App\Traits;

use App\Models\Users\User;

trait IsUser
{
    /**
     * This method is used to check if the user relationship
     */

     public function user(){
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models\Users;

use App\Traits\PlayersManagement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsidePlayer extends Model
{
    /** @use HasFactory<\Database\Factories\InsidePlayerFactory> */
    /** ^use PlayersManagement<\App\Traits\PlayersManagement> */
    use HasFactory , PlayersManagement;
    
    protected $guarded = [];
}

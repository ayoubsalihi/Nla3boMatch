<?php

namespace App\Models\Users;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\PlayersManagement;
class Goalkeeper extends Model
{
    /** @use HasFactory<\Database\Factories\GoalkeeperFactory> */
    /** @use PlayersManegemet<\App\Traits\PlayersManagement> */
    use HasFactory , PlayersManagement;
    protected $guarded = [];
}

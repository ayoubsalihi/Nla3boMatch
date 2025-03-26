<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /** @use HasFactory<\Database\Factories\PermissionFactory> */
    use HasFactory;
    /**
     * @abstract this model is for the admin_role table
     */
    // table name associated to the model
    protected $table = "admin_role";
}

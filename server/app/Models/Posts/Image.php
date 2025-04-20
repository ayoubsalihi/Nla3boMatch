<?php

namespace App\Models\Posts;

use App\Traits\PostsManagement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory , PostsManagement;
    protected $guarded = [];
}

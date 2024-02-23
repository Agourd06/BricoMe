<?php

namespace App\Models;

use App\Models\trait\HeritageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory , HeritageTrait;
    protected $fillable = [
        'user_id',
      
    ];
}

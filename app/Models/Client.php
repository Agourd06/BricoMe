<?php

namespace App\Models;

use App\Models\trait\HeritageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory , HeritageTrait;
    protected $fillable = [
        'description',
        'user_id'
    ];
 
}

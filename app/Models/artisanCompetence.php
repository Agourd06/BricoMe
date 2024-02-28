<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artisanCompetence extends Model
{
    use HasFactory;
    protected $fillable = [
        'competence',
        'artisan_id',
        'tarif',
    ];
}

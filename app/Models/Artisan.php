<?php

namespace App\Models;

use App\Models\trait\HeritageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artisan extends Model
{
    use HasFactory , HeritageTrait;

    protected $fillable = [
        'user_id',
        'description',
        'job',
        'skills',
        'multiplePhotos',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function artisancompetences()
    {
        return $this->hasMany(artisanCompetence::class);
    }
}

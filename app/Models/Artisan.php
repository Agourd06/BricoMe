<?php

namespace App\Models;

use App\Models\trait\HeritageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artisan extends Model
{
    use HasFactory, HeritageTrait;

    protected $fillable = [
        'user_id',
        'description',
        'job_id',
        'tarif',
        'skills',
        'multiplePhotos',
    ];

    public function job()
    {
        return $this->belongsTo(job::class, 'job_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function artisancompetences()
    {
        return $this->hasMany(artisanCompetence::class);
    }
}

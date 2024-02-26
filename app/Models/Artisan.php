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
        'tarif',
        'skills',
        'multiplePhotos',
    ];

    public function artisanJobs()
    {
        return $this->hasMany(artisanJobs::class);
    }

    public function jobs()
    {
        return $this->belongsToMany(job::class, 'artisan_jobs');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function artisanCompetence()
    {
        return $this->hasMany(artisanCompetence::class);
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'artisan_competences', 'artisan_id', 'competence')->withPivot('tarif');
    }


}

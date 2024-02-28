<?php

namespace App\Models;

use App\Models\trait\HeritageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Artisan extends Model
{
    use HasFactory, HeritageTrait, Notifiable;

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

    public function getArtisanDATA()
    {
        $data = DB::table('users')
            ->where('users.id', '=', auth()->id())
            ->join('artisans', 'users.id', '=', 'artisans.user_id')
            ->select('users.id', 'artisans.user_id as specialId', 'users.provider' ,'users.lname', 'users.email', 'users.Phone', 'users.Profil', 'users.birthday', 'users.city', 'users.phone')
            ->get();

        return $data;
    }

    public function moroccanCities()
    {
        return [
            'Casablanca',
            'Marakech',
            'Rabat',
            'El Jadida',
        ];
    }


}

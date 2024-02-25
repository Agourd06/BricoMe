<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'id_job',
    ];
    public function job(){
        return $this->belongsTo(job::class , 'id_job');
    }
    public function artisans()
    {
        return $this->belongsToMany(Artisan::class, 'artisan_competences', 'competence', 'artisan_id');
    }
}

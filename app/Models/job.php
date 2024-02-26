<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;
   protected $fillable =[
    'name',
   ];
   public function competence(){
    return $this->HasMany(Competence::class , 'id_job');
}
   public function artisans(){
    return $this->hasMany(Artisan::class);
}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artisan extends Model
{
    use HasFactory;

    protected $fillable = [
        'iser_id',
        'description' ,
        'job' ,
        'skills[]' ,
        'photoTabs' ,
        'multiplePhotos[]' ,
        

    ];
    public function User (){
        return $this->belongsTo(User::class);
    }
}

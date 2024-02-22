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
        'service1' ,
        'tarif1' ,
        'service2' ,
        'tarif2' ,

    ];
}

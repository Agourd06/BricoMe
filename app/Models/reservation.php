<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
  protected  $fillable = [
    'artisanName' ,
    'adress' ,
    'job_id' ,
    'competence_id' ,
    'date' ,
    'city' ,
    'price' ,
    'client_id' ,
    'artisan_id' ,

  ];
}

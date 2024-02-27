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
    'job' ,
    'skill' ,
    'date' ,
    'city' ,
    'price' ,
    'client_id' ,
    'artisan_id' ,
  ];

    public function artisan()
    {
        return $this->belongsTo(Artisan::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}

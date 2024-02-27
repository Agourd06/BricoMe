<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artisanJobs extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'artisan_id',
    ];
    public function job()
    {
        return $this->belongsTo(job::class);
    }
}

<?php

namespace App\Models\trait;

use App\Models\User;

trait HeritageTrait
{

    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

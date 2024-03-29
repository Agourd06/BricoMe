<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Client;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lname' ,
        'fname' ,
        'email' ,
        'password' ,
        'birthDay' ,
        'Phone' ,
        'city' ,
        'Profil' ,
        'provider',
        'provider_id',
        'provider_token',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function Artisan()
    {
        return $this->hasOne(Artisan::class);
    }

    public function Client()
    {
        return $this->hasOne(Client::class);
    }

    public function Admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function isAdmin()
    {
        return $this->Admin !== null;
    }


    public function isArtisan()
    {
        return $this->Artisan !== null;
    }

    public function isClient()
    {
        return $this->Client !== null;
    }
}

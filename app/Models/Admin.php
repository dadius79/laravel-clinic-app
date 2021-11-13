<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//EDBYDOS
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name', 'username', 'email', 'date_of_birth', 'sex', 'national_status', 'national_id', 'password', 
    ];

    protected $hidden = [
        'password', 'rember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

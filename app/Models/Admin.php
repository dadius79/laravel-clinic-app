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
        'name', 'username', 'email', 'date_of_birth', 'sex', 'national_status', 'national_id', 'address', 'phone_number', 'emergency_number', 'profession_id', 'profession_certificate_number', 'admin_role', 'active', 'password', 
    ];

    protected $hidden = [
        'password', 'rember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin_role(){
        return $this->hasOne(AdminRoles::class);
    }

    public function user_menus(){
        return $this->hasMany(UserMenu::class);
    }

    public function user_sub_menus(){
        return $this->hasMany(UserSubMenu::class);
    }

    public function user_option_menus(){
        return $this->hasMany(UserOptionMenu::class);
    }

    public function patients(){
        return $this->hasMany(Patient::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Menu extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name', 'slug', 'url', 'active',
    ];

    public function submenus(){
        return $this->hasMany(SubMenu::class);
    }

    public function role_menus(){
        return $this->hasMany(RoleMenu::class);
    }

    public function user_menus(){
        return $this->hasMany(UserMenu::class);
    }
}

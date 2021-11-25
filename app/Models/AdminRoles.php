<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRoles extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function role_menus(){
        return $this->hasMany(RoleMenu::class);
    }

    public function role_sub_menus(){
        return $this->hasMany(RoleSubMenu::class);
    }

    public function role_option_menus(){
        return $this->hasMany(RoleOptionMenu::class);
    }
    
}

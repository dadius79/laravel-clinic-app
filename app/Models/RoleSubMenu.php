<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleSubMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id', 'sub_menu_id',
    ];

    public function admin_roles(){
        return $this->belongsTo(AdminRoles::class);
    }

    public function sub_menus(){
        return $this->belongsTo(SubMenu::class);
    }
}

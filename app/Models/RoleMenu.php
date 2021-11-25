<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id', 'menu_id',
    ];

    public function admin_roles(){
        return $this->belongsTo(AdminRoles::class);
    }

    public function menus(){
        return $this->belongsTo(Menu::class);
    }
}

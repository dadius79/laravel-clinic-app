<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleOptionMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id', 'option_menu_id',
    ];

    public function admin_roles(){
        return $this->belongsTo(AdminRoles::class);
    }

    public function option_menus(){
        return $this->belongsTo(OptionMenu::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'admins', 'sub_menus',
    ];

    public function admins(){
        return $this->belongsTo(Admin::class);
    }

    public function sub_menus(){
        return $this->belongsTo(SubMenu::class);
    }
}

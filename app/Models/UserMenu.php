<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id', 'menu_id',
    ];

    public function admins(){
        return $this->belongsTo(Admin::class);
    }

    public function menus(){
        return $this->belongsTo(Menu::class);
    }
}

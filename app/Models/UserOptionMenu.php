<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOptionMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id', 'option_menu_id',
    ];

    public function admins(){
        return $this->belongsTo(Admin::class);
    }

    public function option_menus(){
        return $this->belongsTo(OptionMenu::class);
    }
}

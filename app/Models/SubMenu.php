<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id', 'name', 'slug', 'url'
    ];

    public function menus(){
        return $this->belongsTo(Menu::class);
    }

    public function option_menus(){
        return $this->hasMany(OptionMenu::class);
    }
}

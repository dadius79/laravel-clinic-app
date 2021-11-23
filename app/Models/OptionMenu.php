<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_menu_id', 'name', 'slug', 'url', 'active',
    ];
    
    public function sub_menus(){
        return $this->belongsTo(SubMenu::class);
    }
}

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
}

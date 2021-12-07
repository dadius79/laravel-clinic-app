<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'date_of_birth', 'sex', 'national_status', 'national_id', 'address', 'phone_number', 'emergency_number', 'registered_by',
    ];

    public function admins(){
        return $this->belongsTo(Admin::class);
    }

    public function visits(){
        return $this->hasMany(Visit::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        'balance', 'paid', 'served_by', 'status',
    ];

    public function visits(){
        return $this->belongsTo(Visit::class);
    }

    public function admins(){
        return $this->belongsTo(Admin::class);
    }
}

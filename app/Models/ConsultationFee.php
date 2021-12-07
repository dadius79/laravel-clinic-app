<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id', 'fees', 'active',
    ];
}

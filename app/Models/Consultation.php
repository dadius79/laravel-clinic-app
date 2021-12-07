<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id', 'details', 'consultation_fee', 'status',
    ];

    public function visits(){
        return $this->belongsTo(Visit::class);
    }

}
